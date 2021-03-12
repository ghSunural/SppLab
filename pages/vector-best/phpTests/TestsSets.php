<?php


namespace Application;


class TestsSets
{

    private static $testSets = [];

    public function __construct()
    {


    }

    public static function create($nameSet, $set)
    {
        //$testSets
    }

    public static function add($nameSet, $set)
    {
        self::$testSets[$nameSet] = $set;
    }

    /**
     * @param $nameSet
     * @return mixed
     * suite1_source
     * suite1_test_add1entry
     */

    public static function getTestSet($nameSet): array
    {

        $json = file_get_contents('pages/vector-best/models/SMedicalDevice.json');
        $suite = json_decode($json, true, 10, JSON_OBJECT_AS_ARRAY);
        self::add('template', $suite);

        $json = file_get_contents('pages/vector-best/phpTests/jsontests/suite_full/source.json');
        $arr = json_decode($json, true, 10, JSON_OBJECT_AS_ARRAY);
        //Debug::print_array($arr);
        self::add('suite_full_source', $arr);

        $json = file_get_contents('pages/vector-best/phpTests/jsontests/suite_add/source.json');
        $suite = json_decode($json, true, 10, JSON_OBJECT_AS_ARRAY);
        self::add('source_checkadd', $suite);

        $json = file_get_contents('pages/vector-best/phpTests/jsontests/suite_add/add.json');
        $suite = json_decode($json, true, 10, JSON_OBJECT_AS_ARRAY);
        self::add('add_checkadd', $suite);


        return self::$testSets[$nameSet];
    }

}