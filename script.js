
/* TOGGLE MENU

*/
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () =>{
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}




let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');


window.onscroll = () => {
    sections.forEach(sec =>{
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset +height){
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
            });
        };
    });


/* STICKY NAVBAR */


let header = document.querySelector('header');

header.classList.toggle('sticky', window.scrollY > 100);

/* remove toggle icon and navbar when click navbar link */


    menuIcon.classList.remove('bx-x');
    navbar.classList.remove('active');
};

/* SCROLL REVEAL */

ScrollReveal({
    //reset:true,
    distance:'80px',
    duration:2000,
    delay:200
})

ScrollReveal().reveal('.home-content, .heading, .about-img',{origin:'top'});
ScrollReveal().reveal('.skills-row, .about-content, .home-img, .services-container, .portfolio-box, .contact form, .review',{origin:'bottom'});
ScrollReveal().reveal('.home-content h1, .education-column',{origin:'left'});
ScrollReveal().reveal('.home-content p',{origin:'right'});



/* typed js */

const typed = new Typed('.multiple-text',{
    strings: ['Frontend Developerem','Studentem','Freelancerem'],
    typeSpeed:100,
    backSpeed:100,
    backDelay:1000,
    loop:true
});


/* OPINIE */

// local reviews data
const reviews = [
    {
      id: 1,
      name: 'Julia Płachecka',
      job: 'web developer',
      img: 'julia.jpg',
      text: "Jestem naprawdę zadowolona z usług, które świadczyłeś dla mnie. Twoje strony internetowe są nie tylko piękne wizualnie, ale także funkcjonalne i łatwe w nawigacji. Cenię twoje umiejętności twórcze i profesjonalizm. Zdecydowanie polecam!",
    },
    {
      id: 2,
      name: 'Anna Johnson',
      job: 'web designer',
      img: 'https://www.course-api.com/images/people/person-2.jpeg',
      text: "Praca, którą wykonałeś dla mojego sklepu internetowego, przekroczyła moje oczekiwania. Twoje umiejętności projektowania i programowania są niesamowite. Strona jest responsywna, estetyczna i działa płynnie na różnych urządzeniach.",
    },
    {
      id: 3,
      name: 'Peter Jones',
      job: 'intern',
      img: 'https://www.course-api.com/images/people/person-4.jpeg',
      text: "Kiedy potrzebowałem nowej strony internetowej dla mojego bloga, skontaktowałem się z tobą i jestem tak wdzięczny, że to zrobiłem. Twoja strona jest nowoczesna, atrakcyjna wizualnie i łatwa w obsłudze. Cieszę się, że mogłem z Tobą współpracować!",
    },
    {
      id: 4,
      name: 'Bill Anderson',
      job: 'the boss',
      img: 'https://www.course-api.com/images/people/person-3.jpeg',
      text: "Jesteś prawdziwym mistrzem tworzenia stron internetowych! Dzięki Tobie moja firma ma teraz profesjonalną stronę, która przyciąga klientów i zwiększa naszą widoczność online. Twoje podejście jest skrupulatne, a rezultaty mówią same za siebie. Gorąco polecam!",
    },
  ];
  // select items
  const img = document.getElementById('person-img');
  const author = document.getElementById('author');
  const job = document.getElementById('job');
  const info = document.getElementById('info');
  
  const prevBtn = document.querySelector('.prev-btn');
  const nextBtn = document.querySelector('.next-btn');
  const randomBtn = document.querySelector('.random-btn');
  
  // set starting item
  let currentItem = 0;
  
  // load initial item
  window.addEventListener('DOMContentLoaded', function () {
    const item = reviews[currentItem];
    img.src = item.img;
    author.textContent = item.name;
    job.textContent = item.job;
    info.textContent = item.text;
  });
  
  // show person based on item
  function showPerson(person) {
    const item = reviews[person];
    img.src = item.img;
    author.textContent = item.name;
    job.textContent = item.job;
    info.textContent = item.text;
  }
  // show next person
  nextBtn.addEventListener('click', function () {
    currentItem++;
    if (currentItem > reviews.length - 1) {
      currentItem = 0;
    }
    showPerson(currentItem);
  });
  // show prev person
  prevBtn.addEventListener('click', function () {
    currentItem--;
    if (currentItem < 0) {
      currentItem = reviews.length - 1;
    }
    showPerson(currentItem);
  });
  // show random person
  randomBtn.addEventListener('click', function () {
    console.log('hello');
  
    currentItem = Math.floor(Math.random() * reviews.length);
    showPerson(currentItem);
  });
  