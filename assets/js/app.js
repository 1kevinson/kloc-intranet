/* Footer date for copyright */
let date = new Date();
year = date.getFullYear().toString();


y = document.getElementById('footer-year');
y.innerText = year;


/* Change password to text */
seePassword = function sp() {
    let x = document.getElementById('password-view');
    let y = document.getElementById('password-input');

    if( y.type === 'password') {
        y.type = 'text';
        x.innerHTML = "<i class=\"far fa-eye-slash\"></i>";
    } else {
        y.type = 'password';
        x.innerHTML = "<i class=\"far fa-eye\"></i>";
    }
};
