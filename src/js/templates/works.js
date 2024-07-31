const element = document.querySelector('.ajax-grid');
const button  = document.querySelector('.load-more');
let page      = parseInt(element.getAttribute('data-page'));

const fetchProjects = async () => {
  let url = `${window.location.href.split('#')[0]}.json/page:${page}`; // see info
  try {
    const response       = await fetch(url);
    const { html, more } = await response.json();
    button.hidden        = !more;
    element.insertAdjacentHTML('beforeend', html);
    page++;
  } catch (error) {
    console.log('Fetch error: ', error);
  }
}

document.documentElement.classList.replace('no-js', 'js');
button.addEventListener('click', fetchProjects);