$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 1 },
            576: { items: 2 },
            768: { items: 3 },
            992: { items: 4 },
            1200: { items: 5 },
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const toggleButtons = document.querySelectorAll(".toggle-password");

    toggleButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const passwordInput = this.previousElementSibling;
            const type =
                passwordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordInput.setAttribute("type", type);

            const icon = this.querySelector("i");
            if (type === "text") {
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    });
});

/* Start Choosing business type page */
document.addEventListener("DOMContentLoaded", function () {
    const tabs = Array.from(document.querySelectorAll(".tab-item"));
    const panes = Array.from(document.querySelectorAll(".tab-pane"));
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const confirmBtn = document.getElementById("confirmBtn");

    let currentTab = 0;

    function updateTab(index) {
        tabs.forEach((tab, i) => {
            tab.classList.toggle("active", i === index);
            tab.setAttribute("aria-selected", i === index);
        });

        panes.forEach((pane, i) => {
            if (i === index) {
                pane.classList.add("show", "active");
                pane.style.display = "block";
            } else {
                pane.classList.remove("show", "active");
                pane.style.display = "none";
            }
        });

        prevBtn.classList.toggle("d-none", index === 0);
        nextBtn.classList.toggle("d-none", index === tabs.length - 1);
        confirmBtn.classList.toggle("d-none", index !== tabs.length - 1);
    }

    tabs.forEach((tab, i) => {
        tab.addEventListener("click", () => {
            currentTab = i;
            updateTab(currentTab);
        });
    });

    // Next
    nextBtn.addEventListener("click", () => {
        if (currentTab < tabs.length - 1) {
            currentTab++;
            updateTab(currentTab);
        }
    });

    // Back
    prevBtn.addEventListener("click", () => {
        if (currentTab > 0) {
            currentTab--;
            updateTab(currentTab);
        }
    });

    // Confirm
    confirmBtn.addEventListener("click", () => {
        alert("Form confirmed!");
        // Здесь можно отправить форму или перейти на страницу
    });

    updateTab(currentTab);
});

const occupationSelect = document.getElementById("occupationSelect");
const otherField = document.getElementById("otherOccupationField");

occupationSelect.addEventListener("change", function () {
    if (this.value === "other") {
        otherField.style.display = "flex";
    } else {
        otherField.style.display = "none";
    }
});

const yesRadio = document.getElementById("citizenshipYes");
const noRadio = document.getElementById("citizenshipNo");
const extraSection = document.getElementById("nonCitizenSection");

function toggleExtraSection() {
    if (noRadio.checked) {
        extraSection.style.display = "block";
    } else {
        extraSection.style.display = "none";
    }
}

yesRadio.addEventListener("change", toggleExtraSection);
noRadio.addEventListener("change", toggleExtraSection);

const visaSelect = document.getElementById("visaSelect");
const otherVisaInput = document.getElementById("otherVisaInput");

visaSelect.addEventListener("change", function () {
    if (this.value === "other") {
        otherVisaInput.style.display = "block";
    } else {
        otherVisaInput.style.display = "none";
    }
});

/* End Choosing business type page */
