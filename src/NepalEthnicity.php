<?php 
namespace Bikramdhami0011\Fwu;

Class NepalCommunities
{
    public function ethnicities()
    {
        return json_decode(file_get_contents(__DIR__.'/data/ethnicities.json'), true);
    }
    public function religions()
    {
        return json_decode(file_get_contents(__DIR__.'/data/religions.json'), true);
    }
    public function castes()
    {
        return json_decode(file_get_contents(__DIR__.'/data/ethnicities.json'), true);
    }
     

}