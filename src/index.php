<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Streaming\Representation;

require '../vendor/autoload.php';

function wh_log(string $msg) : void {
    $filename = '../log/log';
    $logData = $filename.'.log';
    file_put_contents($logData, $msg);
}


$format = new Streaming\Format\X264();
$format->on('progress', function ($video, $format, $percentage) {
    wh_log($percentage);
    echo sprintf("\rTranscoding...(%s%%) [%s%s]", $percentage, str_repeat('#', $percentage), str_repeat('-', (100 - $percentage)));
});

$log = new Logger('FFmpeg_Streaming');
$log->pushHandler(new StreamHandler('../log/ffmpeg-streaming.log')); // path to log file

$ffmpeg = Streaming\FFMpeg::create();
$video = $ffmpeg->open('../video/asake.mp4');

$r_144p  = (new Representation)->setKiloBitrate(95)->setResize(256, 144);
$r_240p  = (new Representation)->setKiloBitrate(150)->setResize(426, 240);
$r_360p  = (new Representation)->setKiloBitrate(276)->setResize(640, 360);
$r_480p  = (new Representation)->setKiloBitrate(750)->setResize(854, 480);
$r_720p  = (new Representation)->setKiloBitrate(2048)->setResize(1280, 720);
$r_1080p = (new Representation)->setKiloBitrate(4096)->setResize(1920, 1080);
$r_2k    = (new Representation)->setKiloBitrate(6144)->setResize(2560, 1440);
$r_4k    = (new Representation)->setKiloBitrate(17408)->setResize(3840, 2160);


//A path you want to save a random key to your local machine
$save_to = '../key';

//A URL (or a path) to access the key on your website
$url = 'http://localhost/video_stream/key';
// or $url = '/"PATH TO THE KEY DIRECTORY"/key';


$video->dash()
    //->encryption($save_to, $url)
    ->x264()
    //->addRepresentations([$r_144p, $r_240p, $r_360p, $r_480p, $r_720p, $r_1080p, $r_2k, $r_4k])
    ->addRepresentations([$r_144p, $r_240p, $r_360p, $r_480p, $r_720p])
    ->save('../output/dash-stream.mpd');
    //->save('../hls/dash-stream.m3u8');

$frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(42));
$frame->save('../image/poster.jpg');

$video
    ->gif(FFMpeg\Coordinate\TimeCode::fromSeconds(2), new FFMpeg\Coordinate\Dimension(640, 480), 3)
    ->save('../image/animated_image.gif');

wh_log('100');
sleep(3);
wh_log('completed');
sleep(3);
wh_log('0');
