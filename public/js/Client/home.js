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


const headings = [
    "Câu trả lời chính xác",
    "Tìm kiếm câu hỏi nhanh chóng",
    "Nhận tất cả câu hỏi sức khỏe",
    "Trả lời nhanh chóng",
  ];
  let currentHeadingIndex = 0;
  const headingElement = document.getElementById("dynamic-heading");
  function changeHeading() {
    headingElement.innerText = headings[currentHeadingIndex];
    currentHeadingIndex = (currentHeadingIndex + 1) % headings.length;
  }
  setInterval(changeHeading, 8000);


  clearInterval(intervalId);
