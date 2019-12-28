<?php


namespace Util\geo;


class TGeoPoint
{

    private $name;
    private $description;
    private $lat;
    private $long;
    private $alt;

    public function __construct($lat, $long, $alt = NULL, $name = NULL, $description = NULL)
    {
        $this->lat = $lat;
        $this->long = $long;
        $this->alt = is_null($alt) ? 0 : $alt;
        $this->name = is_null($name) ? "" : $name;
        $this->description = is_null($description) ? "" : $description;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @return mixed
     */
    public function getAlt()
    {
        return $this->alt;
    }

    public  function toKml()
    {
        return $PointAsKml = <<< EOL
	<Placemark>
        <name>
{$this->getName()}     
		</name>
		<IconStyle>
		<Icon>
        <href></href>
        </Icon>
        </IconStyle>
        <description>
{$this->getDescription()}
        </description>
        <Point>
        <coordinates>{$this->getLong()}, {$this->getLat()}, {$this->getAlt()}</coordinates>
        </Point>
    </Placemark>
EOL;
    }


}