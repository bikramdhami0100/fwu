<?php 
 
namespace Bikramdhami0011\Fwu;

class WorldNationals  
{ 
    protected $nationals = [];
     public function __construct()
    {
        $this->nationals = json_decode(file_get_contents(__DIR__.'/data/nationals.json'), true);
    }

    public function nationals()
    {
        return $this->nationals;
    }
    public function nationalByName($name)
    {
        return collect($this->nationals)->first(fn($n) => $n['name'] == $name);
    }
    public function nationalByCode($code)
    {
        return collect($this->nationals)->first(fn($n) => $n['code'] == $code);
    }
    
}