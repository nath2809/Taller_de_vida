
// GRAFICO SOBRE LA CANTIDAD DE MENORES DE EDAD ATENDIDOS POR ACTIVIDADES \\

const boysActivity = document.getElementById('boysActivityGrafic');

    new Chart(boysActivity, {
    type: 'polarArea',
    data: {
        labels: ['Ninos', 'Ninas'],

        datasets: [{
        label: 'Cantidad de menores de edad',
        data: data,
        backgroundColor: [
            'rgba(54, 162, 235, 0.4)', 
            'rgba(255, 99, 132, 0.4)', 
        ],
        borderColor:[
            'rgb(54, 162, 235)',
            'rgb(255, 99, 132)', 
        ],
        borderWidth: 1
        }]
    },
    options:{
        responsive:true,

    },
    });

//--GRAFICO SOBRE LAS REGIONES DE LAS ACTIVIDADES--\\

const regionActivity = document.getElementById('regionActivityGrafic');

    new Chart(regionActivity, {
    type: 'polarArea',
    data: {
        labels: labelsRegion,
        datasets: [{
        label: 'Actividades por Regiones',
        data: totalRegion,

        backgroundColor: [
            'rgba(255, 225, 93, 0.6)',
            'rgba(220, 53, 53, 0.6)', 
            'rgba(255, 96, 0, 0.6)',
            'rgba(149, 205, 65, 0.6)',
            'rgba(193, 244, 197, 0.6)',
            'rgba(101, 193, 140, 0.6)',
            'rgba(6, 0, 71, 0.6)',
            'rgba(51, 47, 208, 0.6)',
            'rgba(22, 255, 0, 0.6)',
            'rgba(253, 255, 0, 0.6)'
        ],
        
        borderColor:[
            'rgb(255, 225, 93)',
            'rgb(220, 53, 53)', 
            'rgb(255, 96, 0)',
            'rgb(149, 205, 65)',
            'rgb(193, 244, 197)',
            'rgb(101, 193, 140)',
            'rgb(6, 0, 71)',
            'rgb(51, 47, 208)',
            'rgb(22, 255, 0)',
            'rgb(253, 255, 0)'
        ],
        borderWidth: 1
        }]
    },
    options:{
        responsive:true,

    }
    });

//--GRAFICO SOBRE LAS CIUDADES DE LAS ACTIVIDADES--\\

const cityActivity = document.getElementById('cityActivityGrafic');

    new Chart(cityActivity, {
    type: 'polarArea',
    data: {
        labels: labelsCity,
        datasets: [{
        label: 'Actividades por Ciudad',
        data: totalCity,
        backgroundColor: [
            'rgba(255, 225, 93, 0.6)',
            'rgba(220, 53, 53, 0.6)', 
            'rgba(255, 96, 0, 0.6)',
            'rgba(149, 205, 65, 0.6)',
            'rgba(193, 244, 197, 0.6)',
            'rgba(101, 193, 140, 0.6)',
            'rgba(6, 0, 71, 0.6)',
            'rgba(51, 47, 208, 0.6)',
            'rgba(22, 255, 0, 0.6)',
            'rgba(253, 255, 0, 0.6)'
        ],
        borderColor:[
            'rgb(255, 225, 93)',
            'rgb(220, 53, 53)', 
            'rgb(255, 96, 0)',
            'rgb(149, 205, 65)',
            'rgb(193, 244, 197)',
            'rgb(101, 193, 140)',
            'rgb(6, 0, 71)',
            'rgb(51, 47, 208)',
            'rgb(22, 255, 0)',
            'rgb(253, 255, 0)'

        ],
        borderWidth: 1
        }]
    },
    options:{
        responsive:true,

    }
    });

//--GRAFICO SOBRE LOS TIPOS DE ACTIVIDADES --\\

const typeActivity = document.getElementById('typeActivityGrafic');

    new Chart(typeActivity, {
    type: 'polarArea',
    data: {
        labels: labelsType,
        datasets: [{
        label: 'Tipo de Actividad',
        data: totalType,
        backgroundColor: [
            'rgba(14, 131, 136, 0.6)', 
            'rgba(25, 55, 109, 0.6)',
            'rgba(87, 108, 188, 0.6)',
            'rgba(255, 72, 72, 0.6)',
            'rgba(179, 255, 174, 0.6)'
        ],
        borderColor:[
            'rgb(14, 131, 136)',
            'rgb(25, 55, 109)',
            'rgb(87, 108, 188)',
            'rgb(255, 72, 72)',
            'rgb(179, 255, 174)'
        ],

        borderWidth: 1
        }]
    },
    options:{
        responsive:true,

    }
    });

// GRAFICO SOBRE LOS MENORES POR REGIONES \\

const RegionByYouths = document.getElementById('YouthsRegionesGrafic');

    new Chart(RegionByYouths, {
    type: 'line',
    data: {
        labels: labelsYouths,
        datasets: [{

            type: 'line',
            label: 'Niños por Regiones',
            data: totalBoys,
            borderColor:[
                'rgb(45, 3, 59)',
                'rgb(252, 41, 71)',
                'rgb(193, 71, 233)',
                'rgb(165, 215, 232)',
                'rgb(87, 108, 188)',
                'rgb(3, 201, 136)',
            ],

            borderWidth: 1

    }, {
            type: 'bar',
            label: 'Niñas por Regiones',
            data: totalGirls,
            backgroundColor: [
            'rgba(193, 71, 233, 0.2)', 
                'rgba(252, 41, 71, 0.2)',
                'rgba(45, 3, 59, 0.2)',
                'rgb(165, 215, 232, 0.2)',
                'rgb(87, 108, 188, 0.2)',
                'rgb(3, 201, 136, 0.2)',
            ],
            borderColor:[
                'rgb(193, 71, 233)',
                'rgb(252, 41, 71)',
                'rgb(45, 3, 59)',
                'rgb(165, 215, 232)',
                'rgb(87, 108, 188)',
                'rgb(3, 201, 136)',
            ],

        borderWidth: 1

        }]
    },
    options:{
        responsive:true,

    }
    });

// GRAFICO SOBRE LAS REGION DE LOS USUARIOS \\

const RegionByUsers = document.getElementById('UserRegionesGrafic');

    new Chart(RegionByUsers, {
    type: 'line',
    data: {
        labels: labelsRegionUsers,
        datasets: [{
        label: 'Lideres por Regiones',
        data: totalRegionUsers,
        borderColor:[
            'rgb(193, 71, 233)',
            'rgb(252, 41, 71)',
            'rgb(45, 3, 59)',
            'rgb(165, 215, 232)',
            'rgb(87, 108, 188)',
            'rgb(3, 201, 136)',

        ],

        borderWidth: 1
        }]
    },
    options:{
        responsive:true,

    }
    });

// GRAFICO SOBRE LAS CIUDADES DE LOS USUARIOS \\

const CityByUsers = document.getElementById('UserCitiesGrafic');

    new Chart(CityByUsers, {
    type: 'bar',
    data: {
        labels: labelsCityUsers,
        datasets: [{
        label: 'Lideres por Ciudad',
        data: totalCityUsers,
        backgroundColor: [
            'rgba(193, 71, 233, 0.6)', 
            'rgba(252, 41, 71, 0.6)',
            'rgba(45, 3, 59, 0.6)',
            'rgb(165, 215, 232,0.6)',
            'rgb(87, 108, 188,0.6)',
            'rgb(3, 201, 136, 0.6)',
        ],
        borderColor:[
            'rgb(193, 71, 233)',
            'rgb(252, 41, 71)',
            'rgb(45, 3, 59)',
            'rgb(165, 215, 232)',
            'rgb(87, 108, 188)',
            'rgb(3, 201, 136)',

        ],

        borderWidth: 1
        }]
    },
    options:{
        responsive:true,
        indexAxis: 'y',

    }
    });



