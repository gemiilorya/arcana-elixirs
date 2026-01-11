// import './bootstrap';

// document.addEventListener('DOMContentLoaded', function() {
//     const enterText = document.getElementById('enterText');
//     const banner = document.getElementById('banner');

//     if (enterText && banner) {
//         enterText.addEventListener('click', function() {
//             // Add zoom effect to banner
//             banner.classList.add('zoom');
            
//             // Fade out the text
//             enterText.classList.add('fade');
            
//             // Redirect after animation completes
//             setTimeout(() => {
//                 window.location.href = '/home';
//             }, 1000);
//         });
//     }
// });

// // Floating bubble effect
// const bgDarkDiv = document.querySelector('.bg-dark img');

// if (bgDarkDiv) {
//     const createBubble = () => {
//         const bubble = document.createElement('div');
//         bubble.classList.add('bubble');
//         bubble.style.backgroundColor = '#E79B2A';
//         bubble.style.position = 'absolute';
//         bubble.style.borderRadius = '50%';
//         bubble.style.opacity = Math.random();
//         bubble.style.width = `${Math.random() * 20 + 10}px`;
//         bubble.style.height = bubble.style.width;

//         // Adjust the horizontal location of the bubbles
//         bubble.style.left = `${Math.random() * bgDarkDiv.offsetWidth + 300}px`; // Move bubbles to the right by 100px

//         // Adjust the vertical location of the bubbles (move down by 100px)
//         bubble.style.top = `${Math.random() * 150 + 100}px`; // Limit bubbles to float within a 150px vertical area starting 100px lower

//         // Adjust the height of the floating effect
//         bubble.style.animation = `floatUp ${Math.random() * 3 + 2}s ease-out forwards`;

//         bgDarkDiv.parentElement.appendChild(bubble);

//         bubble.addEventListener('animationend', () => {
//             bubble.remove();
//         });
//     };

//     setInterval(createBubble, 500);
// }

// // Add CSS for bubble animation
// const style = document.createElement('style');
// style.textContent = `
//     @keyframes floatUp {
//         0% {
//             transform: translateY(0);
//             opacity: 1;
//         }
//         100% {
//             transform: translateY(-150px); /* Adjust the height of the floating effect to 150px */
//             opacity: 0;
//         }
//     }
//     .bubble {
//         pointer-events: none;
//     }
// `;
// document.head.appendChild(style);

