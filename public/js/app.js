document.addEventListener('DOMContentLoaded', function () {
    try{
        document.getElementById("carouselFotosProduto").addEventListener("slide.bs.carousel", function(e){
            document.getElementById("carousel-selector-" + e.from).classList.remove("active");
            document.getElementById("carousel-selector-" + e.to).classList.add("active");
        })
    }catch(e){}
})