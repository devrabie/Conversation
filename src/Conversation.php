<?php
namespace devrabie;
class Conversation
{
    private static $redis;

    private static function initialize()
    {
        self::$redis = new Redis();
        self::$redis->connect('localhost', 6379);
    }

    public static function iS($id)
    {
        self::initialize();
        return self::$redis->hExists($id, 'Command');
    }

    public static function Update_is($id, $Command, $txt = null, $Status)
    {
        self::initialize();
        if ($txt !== null && self::$redis->hExists($id, 'Status')) {
            $m = self::$redis->hGet($id, 'Status');
            self::$redis->hSet($id, $m, $txt);
        }
        self::$redis->hSet($id, 'Status', $Status);
        self::$redis->hSet($id, 'Command', $Command);
    }

    public static function stop($id)
    {
        self::initialize();
        if (self::$redis->exists($id)) {
            self::$redis->del($id);
        }
    }

    public static function getCommand($id)
    {
        self::initialize();
        return self::$redis->hGet($id, 'Command');
    }

    public static function getStatus($id)
    {
        self::initialize();
        return self::$redis->hGet($id, 'Status');
    }

    public static function getnotes($id)
    {
        self::initialize();
        return self::$redis->hGet($id, self::getStatus($id));
    }

    public static function Updatedeta($txt, $id, $Status)
    {
        self::initialize();
        self::$redis->hSet($id, $Status, $txt);
    }

    public static function getdeta($Status,$id)
    {
        self::initialize();
        return self::$redis->hGet($id, $Status) ?: '0';
    }

    public static function getmsid()
    {
        self::initialize();
        return self::$redis->get('msid');
    }

    public static function Updatemsid($id)
    {
        self::initialize();
        self::$redis->set('msid', $id);
    }

    public static function getdbid()
    {
        self::initialize();
        return self::$redis->get('db_id');
    }
}