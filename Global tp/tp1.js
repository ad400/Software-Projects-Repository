let users = [];
document.getElementById('client_form').addEventListener('submit', (e) => {
    e.preventDefault();
    const msg = document.getElementsByClassName("erall");
    for (let i = 0; i < msg.length; i++) {
        msg[i].innerHTML = '';
        
    };
    let name = document.getElementById('name');
    let CIN = document.getElementById('CIN');
    let ET = document.querySelector('input[name="chose"]:checked');

    let Validation = true;
  
    if (!name.value.trim()) {
        document.getElementById('ERNOM').textContent = "You need to put your name";
        Validation = false;
    };

    function validateCIN(CIN) {
        const cndcin = /^[A-Z]{2}[0-9]{7}$/;
        if (!cndcin.test(CIN)) {
            document.getElementById('ERCIN').textContent = "CIN doesn't exist";
            return false;
        }
        if (users.some(user => user.CIN === CIN)) {
            document.getElementById('ERCIN').textContent = 'CIN already exists';
            return false;
        }
        return true;
    };
    
    if (!validateCIN(CIN.value)) { 
        Validation = false;
    };
    
    if (!ET) {
        document.getElementById('ERcheck').innerHTML = 'check yes or not pleas';
        Validation = false;
    };

    if (!Validation) {
        return false;
    };

    let user = {
        name: name.value,
        CIN: CIN.value,
        ET: ET.value,
   };
    users.push(user);
    tablework();
    document.getElementById('client_form').reset();
});

function tablework() {
    const tbody = document.getElementById('addlign');
    tbody.innerHTML = '';

    users.forEach((user, grad) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <td>${user.name}</td>
        <td>${user.CIN}</td>
        <td>${user.ET}</td>
        <td>
            <button onclick="deletuse(${grad})">Delet</button>
        </td>
        `;
        tbody.appendChild(tr);
    });

};

function deletuse(grad) {
    users.splice(grad, 1);
    tablework();
};
document.addEventListener('DOMContentLoaded', () => {

document.getElementById('dark').addEventListener('click', () => {
        document.querySelector('header').style.backgroundColor = '#000';
        document.querySelector('footer').style.backgroundColor = '#000';
        document.querySelector('header').style.color = '#fff';
        document.querySelector('footer').style.color = '#fff';
    });

       document.getElementById('blue').addEventListener('click', () => {
        document.querySelector('header').style.backgroundColor = '#00f';
        document.querySelector('footer').style.backgroundColor = '#00f';
        document.querySelector('header').style.color = '#fff';
        document.querySelector('footer').style.color = '#fff';
    });

  document.getElementById('red').addEventListener('click', () => {
        document.querySelector('header').style.backgroundColor = '#f00';
        document.querySelector('footer').style.backgroundColor = '#f00';
        document.querySelector('header').style.color = '#fff';
        document.querySelector('footer').style.color = '#fff';
    });
});