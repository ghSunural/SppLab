class TGeoPoint {

    // #name;
    #name;
    #description;
    #lat;
    #long;
    #alt;

    constructor($lat, $long, $alt, $name, $description) {
        this.#lat = $lat;
        this.#long = $long;
        this.#alt = (typeof $alt == "undefined") ? 0 : $alt;
        this.#name = (typeof $name == "undefined") ? '' : $name;
        this.#description = (typeof $description == "undefined") ? '' : $description;
    }

    getName() {
        return #name;
    }

    getDescription() {
        return #description;
    }

    getLat() {
        return #lat;
    }

    getLong() {
        return #long;
    }

    getAlt() {
        return #alt;
    }


    toKml() {



        return `
<Placemark>
<name>
    ${this.getName()}
</name>
<description>
    ${this.getDescription()}
</description>
<Point>
    <coordinates>${this.getLong()}, ${this.getLat()}, ${this.getAlt()}</coordinates>
</Point>
</Placemark>`;

    }


}
