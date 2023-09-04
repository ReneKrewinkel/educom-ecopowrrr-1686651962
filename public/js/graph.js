window.addEventListener('scroll', scrollGraphs);

function scrollGraphs() 
{
    if(document.body.scrollTop > 80 || document.documentElement.scrollTop > 80){
        const elements = document.querySelectorAll('circle');
        elements.forEach((element) => {
        element.classList.add('active');
        });
        document.getElementById('column-graph').classList.add('active');
    }
}