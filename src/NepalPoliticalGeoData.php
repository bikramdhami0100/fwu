<?php
namespace Bikramdhami0011\Fwu;

class NepalPoliticalGeoData
{
    protected $provinces;
    protected $districts;

    public function __construct()
    {
        $this->provinces = json_decode(file_get_contents(__DIR__.'/data/provinces.json'), true);
        $this->districts = json_decode(file_get_contents(__DIR__.'/data/districts.json'), true);
    }

    // Get all provinces
    public function provinces()
    {
        return $this->provinces;
    }

    // Get districts optionally filtered by province_id
    public function districts($provinceId = null)
    {
        if ($provinceId) {
            return array_filter($this->districts, fn($d) => $d['province_id'] == $provinceId);
        }
        return $this->districts;
    }

    // Get local levels (municipalities + rural) by district id
    public function localLevels($districtId)
    {
        $district = collect($this->districts)->first(fn($d) => $d['id'] == $districtId);
        if (!$district) return [];
        return array_merge(
            $district['municipalities'] ?? [],
            $district['rural_municipalities'] ?? []
        );
    }

    // Optionally get district by name
    public function districtByName($name)
    {
        return collect($this->districts)->first(fn($d) => $d['name'] == $name);
    }
}
