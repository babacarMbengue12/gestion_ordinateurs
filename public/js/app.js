$(function () {
    function addFixedBottomToFooter() {
        let $footer = $("div.footer").addClass("fixed-bottom");

        fake = $("<div>").height($footer.height()).attr("id","foot")
        fake.width($footer.width())
        fake.insertBefore($footer)

    }
    function removeFixedBottomToFooter(){
        $("div.footer").removeClass('fixed-bottom').addClass('mt-3').prev('#foot').remove();
    }
    $('.btn-danger,#preter').click(function () {
        return confirm('Voulez vous vraiment continue');
    });
    $footer = $('div.footer');
    $("#nav").next().addClass('pt-8');


    let resize = function(){

        if(document.body.getBoundingClientRect().height - $footer.height() <= $footer.offset().top){
            addFixedBottomToFooter()
        }
        else{
            removeFixedBottomToFooter()
        }
    };
    resize();
});