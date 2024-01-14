const action=()=>{
    const coll = document.getElementsByClassName("collapsible");
    const content = document.querySelector('.content_text');

    let i;

    for(i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active_collapse");
            setTimeout(()=>{
            if (content.style.display === "block") {
                content.style.display = "none";

            } else {
                content.style.display = "block";
            }
            content.classList.toggle('show');
            },1000/60)
        });
    }



};
action();





const navSlide=()=>{
    const setting = document.querySelector('.setting');
    const gearIcon = document.querySelector('.gearIcon');
    const content = document.querySelector('.content');
    const cancel = document.querySelector('.cancel');

    const burger = document.querySelector('.hamburger');
    const menu = document.querySelector('.left-menu');
    const menuContent = document.querySelector('.content-nav');
    const cancels = document.querySelector('.cancels');

    gearIcon.addEventListener('click',()=>{
        setting.classList.toggle('setting-toggle');
        content.classList.toggle('setting-toggle');
    });

    content.addEventListener('click',()=>{
        setting.classList.toggle('setting-toggle');
        content.classList.toggle('setting-toggle');
    });
    cancel.addEventListener('click',()=>{
        setting.classList.toggle('setting-toggle');
        content.classList.toggle('setting-toggle');
    });


    burger.addEventListener('click',()=>{
        menu.classList.toggle('menu-toggle');
        menuContent.classList.toggle('menu-toggle');
    });
    menuContent.addEventListener('click',()=>{
        menu.classList.toggle('menu-toggle');
        menuContent.classList.toggle('menu-toggle');
    });
    cancels.addEventListener('click',()=>{
        menu.classList.toggle('menu-toggle');
        menuContent.classList.toggle('menu-toggle');
    });
};
navSlide();

const darkModeFunction=()=>{

   const light = document.querySelector('#light');
   const dark = document.querySelector('#dark');
   let darkMode = localStorage.getItem('darkmode');


   //enable dark mode

    const enableDarkMode = ()=>{
       document.body.classList.add('darkMode');

       localStorage.setItem('darkmode','enabled');

       light.checked = false;
       dark.checked = true;

       light.disabled = false;
       dark.disabled = true;

    }

    //enable dark mode

    const disableDarkMode = ()=>{
        document.body.classList.remove('darkMode');

        localStorage.setItem('darkmode',null);

        light.checked = true;
        dark.checked = false;

        light.disabled = true;
        dark.disabled = false;

    }


    //is user visited and set darkmode

    if(darkMode === 'enabled'){
        enableDarkMode();
    }


    dark.addEventListener('click',()=>{

        darkMode = localStorage.getItem('darkMode');
        enableDarkMode();
    });

    light.addEventListener('click',()=>{
        darkMode = localStorage.getItem('darkMode');
        disableDarkMode();
    })




};
darkModeFunction();








const textEditor = ()=>{
    tinymce.init({
        selector: 'textarea#description, textarea#summary',  // change this value according to your HTML

    });
};

textEditor();




const graph=()=>{
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        let markers = [
            {
            coords: [31.230391, 121.473701],
            name: "Shanghai"
                 },
            {
                coords: [27.704060, 85.102493],
                name: "Kathmandu"
            },
            {
                coords: [6.524379, 3.379206],
                name: "Lagos"
            },
            {
                coords: [35.689487, 139.691711],
                name: "Tokyo"
            },
            {
                coords: [23.129110, 113.264381],
                name: "Guangzhou"
            },
            {
                coords: [40.7127837, -74.0059413],
                name: "New York"
            },
            {
                coords: [34.052235, -118.243683],
                name: "Los Angeles"
            },
            {
                coords: [41.878113, -87.629799],
                name: "Chicago"
            },
            {
                coords: [51.507351, -0.127758],
                name: "London"
            },
            {
                coords: [40.416775, -3.703790],
                name: "Madrid "
            }
        ];
        var map = new jsVectorMap({
            map: "world",
            selector: "#world_map",
            zoomButtons: true,
            markers: markers,
            markerStyle: {
                initial: {
                    r: 9,
                    strokeWidth: 7,
                    stokeOpacity: 0.4,
                    fill: window.theme.primary
                },
                hover: {
                    fill: window.theme.primary,
                    stroke: window.theme.primary
                }
            },
            zoomOnScroll: false
        });
        window.addEventListener("resize", () => {
            map.updateSize();
        });
    });




    document.addEventListener("DOMContentLoaded", function() {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span title=\"Previous month\">&laquo;</span>",
            nextArrow: "<span title=\"Next month\">&raquo;</span>",
            defaultDate: defaultDate
        });
    });



    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales ($)",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.success,
                    data: [
                        2115,
                        1562,
                        1584,
                        1892,
                        1587,
                        1923,
                        2566,
                        2448,
                        2805,
                        3438,
                        2917,
                        3327
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
};
graph();




const slug=()=>{
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('input',function (){
        slug.value= this.value.toLowerCase().replace(/ /g,'-').replace([/[^\w-]+/g, '']);
    })
};
slug();
