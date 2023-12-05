(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Calender
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav : false
    });


    //test
        var ctx1 = $("#test").get(0).getContext("2d");
        var myChart2 = new Chart(ctx1, {
            type: "pie",
            data: {
                labels: [],
                datasets: [{
                        label: "Donations",
                        data: [],
                        
                        backgroundColor: ["rgb(0, 204, 255)","rgb(0, 153, 255)","rgb(0, 0, 255)","rgb(204, 153, 255)"]
                    }
                ]
                },
            options: {
                responsive: true
            }
        });
        var names=document.getElementsByName("dataname");
        var datanumber=document.getElementsByName("data");
        var total=document.getElementById("total");
        var percent;
        names.forEach((element ) => {
            myChart2.data.labels.push(element.value.toString());
        })
        datanumber.forEach((elements) => {
            console.log(elements.value);
            myChart2.data.datasets.forEach((dataset) => {
                percent=(elements.value/total.value)*100;
                dataset.data.push(percent);
            });
        })
        myChart2.update();
    //money
    var ctx2 = $("#amount").get(0).getContext("2d");
    var myChart3 = new Chart(ctx2, {
        type: "bar",
        data: {
            labels: [],
            datasets: [{
                    label: "Donations",
                    data: [],
                    
                    backgroundColor: ["rgb(0, 204, 255)","rgb(0, 153, 255)","rgb(0, 0, 255)","rgb(204, 153, 255)"]
                }
            ]
            },
        options: {
            responsive: true
        }
    });
    var anames=document.getElementsByName("amountname");
    var dataamount=document.getElementsByName("amount");
    anames.forEach((element ) => {
        myChart3.data.labels.push(element.value.toString());
    })
    dataamount.forEach((elements) => {
        console.log(elements.value);
        myChart3.data.datasets.forEach((dataset) => {
            dataset.data.push(elements.value);
        });
    })
    myChart3.data.datasets.forEach((dataset) => {
        dataset.data.push(300);
    });
    myChart3.update();
    




    // Single Bar Chart
    var ctx4 = $("#bar-chart").get(0).getContext("2d");
    var myChart4 = new Chart(ctx4, {
        type: "bar",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(0, 156, 255, .7)",
                    "rgba(0, 156, 255, .6)",
                    "rgba(0, 156, 255, .5)",
                    "rgba(0, 156, 255, .4)",
                    "rgba(0, 156, 255, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Pie Chart
    var ctx5 = $("#pie-chart").get(0).getContext("2d");
    var myChart5 = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(0, 156, 255, .7)",
                    "rgba(0, 156, 255, .6)",
                    "rgba(0, 156, 255, .5)",
                    "rgba(0, 156, 255, .4)",
                    "rgba(0, 156, 255, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Doughnut Chart
    var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
    var myChart6 = new Chart(ctx6, {
        type: "doughnut",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(0, 156, 255, .7)",
                    "rgba(0, 156, 255, .6)",
                    "rgba(0, 156, 255, .5)",
                    "rgba(0, 156, 255, .4)",
                    "rgba(0, 156, 255, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });

    
})(jQuery);
function submitForm() {
  document.getElementById("form").submit();
}
