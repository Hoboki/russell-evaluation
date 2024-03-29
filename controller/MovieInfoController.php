<?php
class MovieInfoController
{
    public function __construct(string $file_json="/var/www/html/movie_info.json")
    {
        $mov_info = file_get_contents($file_json);
        $mov_info = mb_convert_encoding($mov_info, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $this->model = json_decode($mov_info, true);
    }

    public function getSessionID(string $day, string $session_idx)
    {
        return $this->model[$day][$session_idx]["id"];
    }
}
