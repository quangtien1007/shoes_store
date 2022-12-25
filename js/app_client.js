function handleShowOrder() {
    document.getElementById("confirm-order").style.display = 'none';
    document.getElementById("confirm-cancel-order").style.display = 'none';
    document.getElementById("cancel-order").style.display = 'none';
    document.getElementById("info-order").style.display = 'block';
}

function handleShowConfirm() {
    document.getElementById("confirm-order").style.display = 'block';
    document.getElementById("cancel-order").style.display = 'none';
    document.getElementById("info-order").style.display = 'none';
    document.getElementById("confirm-cancel-order").style.display = 'none';
}

function handleShowCancel() {
    document.getElementById("confirm-order").style.display = 'none';
    document.getElementById("cancel-order").style.display = 'block';
    document.getElementById("info-order").style.display = 'none';
    document.getElementById("confirm-cancel-order").style.display = 'none';
}

function handleShowConfirmCancel() {
    document.getElementById("confirm-order").style.display = 'none';
    document.getElementById("cancel-order").style.display = 'none';
    document.getElementById("info-order").style.display = 'none';
    document.getElementById("confirm-cancel-order").style.display = 'block';
}

function handleHide() {
    if (document.getElementById("edit-address").style.display == 'none') {
        document.getElementById("edit-address").style.display = 'block';
        document.getElementById("info-address").style.display = 'none';
        document.getElementById("info-address1").style.display = 'none';
    } else {
        document.getElementById("edit-address").style.display = 'none';
        document.getElementById("info-address").style.display = 'block';
        document.getElementById("info-address1").style.display = 'block';
    }
}

function handleShowInfo() {
    document.getElementById("info_nguoidung").style.display = 'block';
    document.getElementById("diachi_nguoidung").style.display = 'none';
    document.getElementById("doimatkhau_nguoidung").style.display = 'none';
}

function handleShowDiaChi() {
    document.getElementById("info_nguoidung").style.display = 'none';
    document.getElementById("diachi_nguoidung").style.display = 'block';
    document.getElementById("doimatkhau_nguoidung").style.display = 'none';
}

function handleShowDoiMatKhau() {
    document.getElementById("info_nguoidung").style.display = 'none';
    document.getElementById("diachi_nguoidung").style.display = 'none';
    document.getElementById("doimatkhau_nguoidung").style.display = 'block';
}

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});