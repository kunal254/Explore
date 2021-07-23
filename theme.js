const tab=window.location.href.split('=').pop();

const lists=document.getElementsByClassName('nav-link');
let found="";
for(const item of lists)
{
    if(item.href.split('=').pop() == tab)
        found=item;
}
if(found){
    found.classList.add('glowit');
}
