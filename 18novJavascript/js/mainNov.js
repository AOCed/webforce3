$(function(){

    $('a').on('click', function(event){
        event.preventDefault();

        // var indexOnglet = $(this).index();
        // console.log(indexOnglet);

        // var indexPanel = indexOnglet + 1;
        // console.log(indexPanel);

        $(this).next().toggle().css({"height":"200px"});



    });
})
