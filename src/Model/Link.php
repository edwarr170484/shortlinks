<?php 
namespace Shorts\Model;

use Shorts\Core\Model;

class Link extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "links";
    }

    public function findAll()
    {
        $links = [];

        $results = $this->manager->query("SELECT * FROM $this->table ORDER BY date_created DESC");

        if(count($results) > 0)
        {
            $links = $this->process($results);
        }

        return $links;
    }

    public function find($id)
    {
        $links = [];

        $results = $this->manager->prepared("SELECT * FROM $this->table WHERE id=?", [intval($id)]);

        if(count($results) > 0)
        {
            $links = $this->process($results);
        }

        return count($links) > 0 ? $links[0] : null;
    }

    public function findByShort($short)
    {
        $links = [];

        $short = htmlspecialchars($short);

        $results = $this->manager->prepared("SELECT * FROM $this->table WHERE short=?", [$short]);

        if(count($results) > 0)
        {
            $links = $this->process($results);
        }

        return count($links) > 0 ? $links[0] : null;
    }

    public function isShortExists($short)
    {
        return ($this->findByShort($short)) ? true : false;
    }

    public function add($values)
    {
        return $this->manager->prepared("INSERT INTO $this->table (name, origin, short) values (?, ?, ?)", $values);
    }

    public function edit($values)
    {
        return $this->manager->prepared("UPDATE $this->table SET name=?, origin=?, short=?, date_updated=current_timestamp() WHERE id=?", $values);
    }

    public function delete($id, $rootDir)
    {
        return $this->manager->prepared("DELETE FROM $this->table WHERE id=?", [intval($id)]);
    }

    public function stat($values)
    {
        return $this->manager->prepared("UPDATE $this->table SET stat=?, date_updated=current_timestamp() WHERE id=?", $values);
    }

    private function process($results)
    {
        $links = [];

        foreach($results as $result)
        {
            $dateCreated = new \DateTime($result["date_created"]);
            $dateUpdated = new \DateTime($result["date_updated"]);
            
            $links[] = [
                "id"     => $result["id"],
                "name"   => $result["name"],
                "origin" => $result["origin"],
                "short"  => $result["short"],
                "stat"   => $result["stat"],
                "date_created" => $dateCreated,
                "date_updated" => $dateUpdated
            ];
        }

        return $links;
    }
}