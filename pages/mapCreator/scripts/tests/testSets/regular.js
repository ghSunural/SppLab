export let regular = function (){

    return [

        {name: '1-ch', x: 110, y: 54.5, z: 0},
        {name: '0-ch-sp_r', x: 110, y: 54, z: 0},
        {name: '2-ch', x: 110, y: 55, z: 0},
        {name: '3-ch', x: 110, y: 55.5, z: 0},
        {name: '4-ch', x: 110.5, y: 54, z: 0},
        {name: '5', x: 110.5, y: 54.5, z: 0},
        {name: '6', x: 110.5, y: 55, z: 0},
        {name: '7-ch', x: 110.5, y: 55.5, z: 0},
        {name: '8-ch', x: 111, y: 54, z: 0},
        {name: '9-ch', x: 111, y: 54.5, z: 0},
        {name: '10-ch', x: 111, y: 55, z: 0},
        {name: '11-ch', x: 111, y: 55.5, z: 0},
    ]
        //.sort(() => Math.random() - 0.5);
};

export let ConvexHulltoBe = () => {

    return [
        '0-ch-sp_r',
        '1-ch',
        '2-ch',
        '3-ch',
        '4-ch',
        '7-ch',
        '8-ch',
        '9-ch',
        '10-ch',
        '11-ch'
    ];
}

export let StartPoint_toBe = function (){

    return '0-ch-sp_r';
}