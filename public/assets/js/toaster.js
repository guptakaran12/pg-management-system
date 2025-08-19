class Toast {
    constructor({
        title = "",
        destroyAfter = 3500,
        theme = "light",
        position = "top-center",
        animateIn = "animate__bounceIn",
        animateOut = "animate__bounceOut",
        type = "default",
    }) {
        this.title = title;
        this.destroyAfter = destroyAfter;
        this.theme = theme;
        this.position = position;
        this.animateIn = animateIn;
        this.animateOut = animateOut;
        this.type = type;
        this.init();
    }

    init() {
        this.container = document.querySelector(
            `.custom-toast__container--${this.position}`
        );
        if (!this.container) {
            this.container = document.createElement("div");
            this.container.classList.add(
                "custom-toast__container",
                `custom-toast__container--${this.position}`
            );
            document.body.appendChild(this.container);
        }
    }

    show() {
        const toast = document.createElement("div");

        const types = {
            success: `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<rect x="0.5" y="0.5" width="19" height="19" rx="9.5" fill="#11AD0E"/>
<rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="white"/>
<path d="M15.3317 6L7.99837 13.3333L4.66504 10" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
</svg>`,
            error: `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<rect x="0.5" y="0.5" width="19" height="19" rx="9.5" fill="#E31010"/>
<rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="white"/>
<path d="M14 6L6 14M6 6L14 14" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
</svg>`,
            warn: `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<rect x="0.5" y="0.5" width="19" height="19" rx="9.5" fill="#B3A400"/>
<rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="white"/>
<path d="M9.14245 5.9301L4.90745 13.0001C4.82013 13.1513 4.77393 13.3228 4.77344 13.4974C4.77295 13.672 4.81819 13.8437 4.90466 13.9954C4.99113 14.1471 5.11581 14.2735 5.2663 14.362C5.41679 14.4506 5.58785 14.4982 5.76245 14.5001H14.2324C14.407 14.4982 14.5781 14.4506 14.7286 14.362C14.8791 14.2735 15.0038 14.1471 15.0902 13.9954C15.1767 13.8437 15.2219 13.672 15.2215 13.4974C15.221 13.3228 15.1748 13.1513 15.0874 13.0001L10.8524 5.9301C10.7633 5.78316 10.6378 5.66166 10.488 5.57734C10.3383 5.49303 10.1693 5.44873 9.99745 5.44873C9.82558 5.44873 9.65661 5.49303 9.50685 5.57734C9.35709 5.66166 9.23158 5.78316 9.14245 5.9301Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10 8.5V10.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10 12.5H10.006" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
</svg>`,
            info: `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<rect x="0.5" y="0.5" width="19" height="19" rx="9.5" fill="#00A3D9"/>
<rect x="0.5" y="0.5" width="19" height="19" rx="9.5" stroke="white"/>
<path d="M9.09526 15.3371V7.70073H10.895V15.3371H9.09526ZM10.0001 6.61692C9.71505 6.61692 9.46979 6.52246 9.26429 6.33354C9.0588 6.14131 8.95605 5.91095 8.95605 5.64249C8.95605 5.37071 9.0588 5.14036 9.26429 4.95144C9.46979 4.7592 9.71505 4.66309 10.0001 4.66309C10.2884 4.66309 10.5337 4.7592 10.7359 4.95144C10.9414 5.14036 11.0441 5.37071 11.0441 5.64249C11.0441 5.91095 10.9414 6.14131 10.7359 6.33354C10.5337 6.52246 10.2884 6.61692 10.0001 6.61692Z" fill="white"/>
</svg>`,
        };

        const themes = {
            light: "custom-toast--light",
            dark: "custom-toast--dark",
        };

        const typeIcon = types[this.type] || "";
        toast.innerHTML = `${typeIcon} ${this.title}`;
        toast.classList.add(
            "custom-toast",
            "animate__animated",
            this.animateIn,
            themes[this.theme],
            `custom-toast--${this.type}`
        );

        this.container.appendChild(toast);
        this.hide(toast);
    }

    hide(toast) {
        setTimeout(() => {
            toast.classList.replace(this.animateIn, this.animateOut);
            toast.addEventListener("animationend", () => {
                toast.remove();
            });
        }, this.destroyAfter);
    }
}

document.addEventListener("livewire:init", () => {
    Livewire.on("show-message", ({ type, message, positionStyle }) => {
        new Toast({
            title: message,
            type: type,
            position: positionStyle,
        }).show();
    });
});

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('a').forEach(function (el) {
        el.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });
    });
});