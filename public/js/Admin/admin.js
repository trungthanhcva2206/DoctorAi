const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
const notice = document.querySelector('.notification');
notice.addEventListener('click', function() {
	allSideMenu.forEach(item => {
		item.parentElement.classList.remove('active');
	});
	allSideMenu[1].parentElement.classList.add('active');
});

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});
const menudash = document.querySelectorAll('.box-info li a');

menudash.forEach((mai, index) => {
    mai.addEventListener('click', function () {
        // Xóa lớp "active" khỏi tất cả các mục trong allSideMenu
        allSideMenu.forEach(item => {
            item.parentElement.classList.remove('active');
        });
        // Thêm lớp "active" vào mục tương ứng trong allSideMenu
        allSideMenu[index+1	].parentElement.classList.add('active');
    });
});

var tds = document.querySelectorAll('td.limit-text');
tds.forEach(function(td) {
	var maxCharacters = 25; // Số ký tự tối đa bạn muốn hiển thị
	var text = td.textContent;
	if (text.length > maxCharacters) {
		td.textContent = text.slice(0, maxCharacters) + '...';
	}
});

document.addEventListener("DOMContentLoaded", function() {
	var brandLink = document.querySelector('.brand');
	var dashboardLink = document.querySelector('a[href="#/dashboard"]');
	
	if (brandLink && dashboardLink) {
		brandLink.addEventListener("click", function(event) {
			event.preventDefault(); // Ngăn chuyển hướng mặc định
			dashboardLink.click(); // Kích hoạt sự kiện click trên thẻ a chứa href="#/dashboard"
		});
	}
});
document.addEventListener("DOMContentLoaded", function () {
    // Lấy ID từ URL
    var url = window.location.href;
    var match = url.match(/#\/([^?]+)/);
    if (match) {
        var targetName = match[1]; // Lấy tên sau "#/"

        var targetLi = document.querySelector('ul.side-menu li a[href="#/' + targetName + '"]').parentNode;
        if (targetLi) {
            targetLi.classList.add("active");
        }
    } else {
        // Nếu không tìm thấy phù hợp trong URL, thêm lớp "active" vào <li> chứa <a href="#/dashboard">
        var defaultLi = document.querySelector('ul.side-menu li a[href="#/dashboard"]').parentNode;
        if (defaultLi) {
            defaultLi.classList.add("active");
        }
	}
});

// Dropdown img
let submenu = document.getElementById("myDropdown");
let toggleButton = document.querySelector(".profile");
function toggleMenu() {
    submenu.classList.toggle("open");
}
document.addEventListener("click", function (event) {
    if (!toggleButton.contains(event.target) && !submenu.contains(event.target)) {
        submenu.classList.remove("open");
    }
});





// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');
menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');

      isMotVisible = !isMotVisible;
})






const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');
const backgroundContainer = document.querySelectorAll(".background_li");
// Kiểm tra xem đã có dữ liệu trong localStorage
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark');
	backgroundContainer.forEach(function (element) {
		element.classList.add('switched');
	});
    switchMode.checked = true;
}

switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
		backgroundContainer.forEach(function (element) {
			element.classList.add('switched');
		});
        localStorage.setItem('darkMode', 'enabled'); // Lưu trạng thái vào localStorage
    } else {
        document.body.classList.remove('dark');
		backgroundContainer.forEach(function (element) {
			element.classList.remove('switched');
		});
        localStorage.removeItem('darkMode'); // Xóa trạng thái khỏi localStorage
    }
});



var currentURL = window.location.href;
    if (currentURL.includes("#/newquestion")) {
      document.getElementById("local_dash").textContent = "New Question";
    }
	if (currentURL.includes("#/answered")) {
		document.getElementById("local_dash").textContent = "Answered";
	}
	if (currentURL.includes("#/question")) {
		document.getElementById("local_dash").textContent = "Question";
	}
	if (currentURL.includes("#/team")) {
		document.getElementById("local_dash").textContent = "Team";
	}



function dash() {
    var element = document.getElementById("local_dash");
    element.innerHTML = "Home";
}

function newquest() {
    var element = document.getElementById("local_dash");
    element.innerHTML = "New Question";
}

function answered() {
    var element = document.getElementById("local_dash");
    element.innerHTML = "Answered";
}

function quest() {
    var element = document.getElementById("local_dash");
    element.innerHTML = "Question";
}

function team() {
    var element = document.getElementById("local_dash");
    element.innerHTML = "Team";
}


const title = document.querySelector('.title');
title.innerHTML = title.innerHTML.split('').map((letters,i)=>
`<span style = "transition-delay:${i * 40}ms;
filter:hue-rotate(${i*30}deg);
">${letters}</span>`
).join('');

document.addEventListener("DOMContentLoaded", function() {
	var spanElements = document.querySelectorAll("span.status");
  
	for (var i = 0; i < spanElements.length; i++) {
	  var span = spanElements[i];
	  if (span.textContent === "Waiting") {
		span.classList.add("pending");
	  }
	  if (span.textContent === "Completed") {
		span.classList.add("completed");
	  }
	}
  });
  
var content = document.getElementById("answ_stt");
var stt_status = document.getElementById("stt_status");
var goXemButtons = document.querySelectorAll(".go_xem");

// Hàm kiểm tra và cập nhật nội dung
function checkAndUpdateStatus() {
  if (content.innerHTML.trim() === "") {
    stt_status.textContent = "Chưa trả lời";
    stt_status.classList.remove("green-text");
    stt_status.classList.add("red-text");
  } else {
    stt_status.textContent = "Đã trả lời";
    stt_status.classList.remove("red-text");
    stt_status.classList.add("green-text");
  }
}
goXemButtons.forEach(function(button) {
  button.addEventListener("click", checkAndUpdateStatus);
});
checkAndUpdateStatus();

