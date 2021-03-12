<?php


namespace vbest\models;

//В соответствии с данными Росздравнадзора
use SplObjectStorage;
use SplObserver;

class TMedicalDevice implements \SplSubject
{

    private SplObjectStorage $observers;


    public $data;

    public $med_device;
    public $changes = [];


    public $register_id_uniq = 'register_id_uniq';
    public $registration_certificate = 'registration_certificate';


    public static function create()
    {


    }

    public function __construct($template)

    {

        $obj = clone $template;

        [$templateObj->register_id_uniq->column];

        $this->data = $obj;


        $this->observers = new SplObjectStorage();
        $struct = file_get_contents('pages/vector-best/models/SMedicalDevice.json');
        $this->med_device = json_decode($struct, true);
        /*   echo '<pre>';
           print_r($this->med_device);
           echo '</pre>';*/


    }

    public static function parseRow($fromRow)
    {

        $obj = [];

        $obj['DT_RowId'] = $fromRow['DT_RowId'];
        //  echo $obg['id'];


        $obj['register_id_uniq'] = $fromRow['col1']['label'];
        //  echo $fromRow['col1']['label'] . "<br>";
        $obj['registration_certificate'] = $fromRow['col2']['label'];

        $obj['href_registration_certificate'] = "";

        $obj['registration_date'] = $fromRow['col3']['label'];
        $obj['validity_period'] = $fromRow['col4']['label'];
        $obj['device_name'] = $fromRow['col5']['title'];
        $obj['enterprise']['applicant']['name'] = $fromRow['col6']['label'];
        $obj['enterprise']['applicant']['address'] = $fromRow['col7']['title'] ?? $fromRow['col7']['label'];
        //   echo $obj['enterprise']['applicant']['address'] . "<br>";
        $obj['enterprise']['applicant']['legal_address'] = $fromRow['col8']['title'] ?? $fromRow['col8']['label'];
        $obj['enterprise']['maker']['name'] = $fromRow['col9']['label'];
        $obj['enterprise']['maker']['address'] = $fromRow['col10']['title'] ?? $fromRow['col10']['label'];
        $obj['enterprise']['maker']['legal_address'] = $fromRow['col11']['title'] ?? $fromRow['col11']['label'];
        $obj['GRCP'] = $fromRow['col12']['label'];
        $obj['riskClass'] = $fromRow['col13']['label'];
        $obj['purpose'] = $fromRow['col14']['label'];
        $obj['nomenclature'] = $fromRow['col15']['label'];
        $obj['address'] = $fromRow['col16']['title'] ?? $fromRow['col16']['label'];
        $obj['swap'] = $fromRow['col17']['label'];

        return $obj;
    }


    public static function print($type_view)
    {

        switch ($type_view) {
            case 'html_table':
                self::printAsHtmlTable();
                break;
            case 'html_list':
                self:: printAsHtmlList();
                break;
            default:
                self::printAsHtmlTable();
        }
    }

    private static function printAsHtmlTable()
    {
        require '';
    }

    private static function printAsHtmlList()
    {
        require '';
    }

    public function checkChanges(): array
    {

        $this->changes = "was changed"; //compareData()
        $this->notify();
        return [];
    }


    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
        // attach [əˈtæʧ] - прикреплять
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.
        //detach [dɪˈtæʧ]  отсодеинить
        $this->observers->detach($observer);
    }

    public function notify()
    {
        // TODO: Implement notify() method.
        //notify [ˈnəʊtɪfaɪ] уведомить
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

?>