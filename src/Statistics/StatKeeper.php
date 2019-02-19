<?php


namespace MyApp\Stats;


class StatKeeper{

    private $stats;

    public function __construct(){
        $this->stats = [];
    }

    public function addProgress(string $file, int $found, int $introduced = null){
        if (!key_exists($file, $this->stats)) {
            $this->stats[$file] = [];
        }
        if( !isset($this->stats[$file]['found']) ){
            $this->stats[$file]['found'] = 0;
        }

        if ($introduced) {
            $this->stats[$file]['introduced'] = '';
            $this->stats[$file]['introduced'] = $introduced;
        }
        $this->stats[$file]['found'] += $found;
    }

    public function saveProgress(){
        $fileWithPath = __DIR__ . "/../../stats/" . date('Ymdhis');
        file_put_contents($fileWithPath, json_encode($this->stats));
        return $fileWithPath;
    }
}