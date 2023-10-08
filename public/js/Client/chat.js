let submenu = document.getElementById("myDropdown");
let toggleButton = document.querySelector(".user_tt");
function toggleMenu() {
    submenu.classList.toggle("open");
}
document.addEventListener("click", function (event) {
    if (!toggleButton.contains(event.target) && !submenu.contains(event.target)) {
        submenu.classList.remove("open");
    }
});


var barsIcon = document.getElementById("bars");
var leftSide = document.querySelector(".leftSide");

barsIcon.addEventListener("click", function() {
    if (leftSide.style.display === "none" || leftSide.style.display === "") {
        leftSide.style.display = "block";
    } else {
        leftSide.style.display = "none";
    }
});

var more_chat = document.querySelector(".more_chat");
var more_drop = document.querySelector(".more_drop");

more_chat.addEventListener("click", function(event) {
    if (more_drop.style.display === "none" || more_drop.style.display === "") {
        more_drop.style.display = "block";
    } else {
        more_drop.style.display = "none";
    }
    
    event.stopPropagation(); // Ngăn chặn sự kiện click từ việc lan toả đến body hoặc các phần tử khác.
});

// Thêm sự kiện click vào body để ẩn more_drop khi click ra ngoài.
document.body.addEventListener("click", function() {
    more_drop.style.display = "none";
});



// Tạo một hàm để kiểm tra URL và áp dụng lớp "active" vào phần tử liên quan
function checkURL() {
    var url = window.location.href;
    var match = url.match(/#\/([^?]+)/);
    if (match) {
        var targetName = match[1];

        var targetLi = document.querySelector('.chatlist .li_chat a[href="#/' + targetName + '"]').parentNode;
        if (targetLi) {
            // Xóa lớp "active" khỏi tất cả các phần tử và thêm nó vào phần tử tương ứng
            var allLis = document.querySelectorAll('.chatlist .li_chat');
            allLis.forEach(function (li) {
                li.classList.remove("active");
            });
            targetLi.classList.add("active");
        }
    } else {
        var defaultLi = document.querySelector('ul.side-menu li a[href="#/dashboard"]').parentNode;
        if (defaultLi) {
            defaultLi.classList.add("active");
        }
    }
}

// Thêm sự kiện lắng nghe cho sự thay đổi trong URL (hashchange event)
window.addEventListener("hashchange", checkURL);

// Gọi hàm kiểm tra lần đầu khi trang tải
checkURL();

