/*
Template Name: HUD - Responsive Bootstrap 5 Admin Template
Version: 1.7.0
Author: Sean Ngu
Website: http://www.seantheme.com/hud/
	----------------------------
		APPS CONTENT TABLE
	----------------------------

	<!-- ======== GLOBAL SCRIPT SETTING ======== -->
  01. Global Variable
  02. Handle Scrollbar
  03. Handle Sidebar Menu
  04. Handle Sidebar Scroll Memory
  05. Handle Card Action
  06. Handle Tooltip & Popover Activation
  07. Handle Scroll to Top Button
  08. Handle hexToRgba
  09. Handle Scroll To
  10. Handle Toggle Class
  11. Handle Theme Panel
  12. Application Controller
  13. Initialise

	<!-- ======== APPLICATION SETTING ======== -->
	Application Controller
*/



/* 01. Global Variable
------------------------------------------------ */
const app = {
    id: '#app',
    isMobile: ((/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) || window.innerWidth < 992),
    bootstrap: {
        tooltip: {
            attr: 'data-bs-toggle="tooltip"'
        },
        popover: {
            attr: 'data-bs-toggle="popover"'
        },
        modal: {
            attr: 'data-bs-toggle="modal"',
            dismissAttr: 'data-bs-dismiss="modal"',
            event: {
                hidden: 'hidden.bs.modal'
            }
        },
        nav: {
            class: 'nav',
            tabs: {
                class: 'nav-tabs',
                activeClass: 'active',
                itemClass: 'nav-item',
                itemLinkClass: 'nav-link'
            }
        }
    },
    header: {
        id: '#header',
        class: 'app-header',
        hasScrollClass: 'has-scroll'
    },
    sidebar: {
        id: '#sidebar',
        class: 'app-sidebar',
        scrollBar: {
            localStorage: 'appSidebarScrollPosition',
            dom: ''
        },
        menu: {
            class: 'menu',
            initAttr: 'data-init',
            animationTime: 0,
            itemClass: 'menu-item',
            itemLinkClass: 'menu-link',
            hasSubClass: 'has-sub',
            activeClass: 'active',
            expandingClass: 'expanding',
            expandClass: 'expand',
            submenu: {
                class: 'menu-submenu',
            }
        },
        mobile: {
            toggleAttr: 'data-toggle="app-sidebar-mobile"',
            dismissAttr: 'data-dismiss="app-sidebar-mobile"',
            toggledClass: 'app-sidebar-mobile-toggled',
            closedClass: 'app-sidebar-mobile-closed',
            backdrop: {
                class: 'app-sidebar-mobile-backdrop'
            }
        },
        minify: {
            toggleAttr: 'data-toggle="app-sidebar-minify"',
            toggledClass: 'app-sidebar-minified',
            cookieName: 'app-sidebar-minified'
        },
        floatSubmenu: {
            id: '#app-sidebar-float-submenu',
            dom: '',
            timeout: '',
            class: 'app-sidebar-float-submenu',
            container: {
                class: 'app-sidebar-float-submenu-container'
            },
            arrow: {
                id: '#app-sidebar-float-submenu-arrow',
                class: 'app-sidebar-float-submenu-arrow'
            },
            line: {
                id: '#app-sidebar-float-submenu-line',
                class: 'app-sidebar-float-submenu-line'
            },
            overflow: {
                class: 'overflow-scroll mh-100vh'
            }
        },
        search: {
            class: 'menu-search',
            toggleAttr: 'data-sidebar-search="true"',
            hideClass: 'd-none',
            foundClass: 'has-text'
        },
        transparent: {
            class: 'app-sidebar-transparent'
        }
    },
    scrollBar: {
        attr: 'data-scrollbar="true"',
        skipMobileAttr: 'data-skip-mobile',
        heightAttr: 'data-height',
        wheelPropagationAttr: 'data-wheel-propagation'
    },
    content: {
        id: '#content',
        class: 'app-content',
        fullHeight: {
            class: 'app-content-full-height'
        },
        fullWidth: {
            class: 'app-content-full-width'
        }
    },
    layout: {
        sidebarLight: {
            class: 'app-with-light-sidebar'
        },
        sidebarEnd: {
            class: 'app-with-end-sidebar'
        },
        sidebarWide: {
            class: 'app-with-wide-sidebar'
        },
        sidebarMinified: {
            class: 'app-sidebar-minified'
        },
        sidebarTwo: {
            class: 'app-with-two-sidebar'
        },
        withoutHeader: {
            class: 'app-without-header'
        },
        withoutSidebar: {
            class: 'app-without-sidebar'
        },
        topMenu: {
            class: 'app-with-top-menu'
        },
        boxedLayout: {
            class: 'boxed-layout'
        }
    },
    scrollToTopBtn: {
        showClass: 'show',
        heightShow: 200,
        toggleAttr: 'data-toggle="scroll-to-top"',
        scrollSpeed: 500
    },
    scrollTo: {
        attr: 'data-toggle="scroll-to"',
        target: 'data-target',
        linkTarget: 'href'
    },
    themePanel: {
        class: 'app-theme-panel',
        toggleAttr: 'data-toggle="theme-panel-expand"',
        cookieName: 'app-theme-panel-expand',
        activeClass: 'active',
        themeListCLass: 'app-theme-list',
        themeListItemCLass: 'app-theme-list-item',
        themeCoverClass: 'app-theme-cover',
        themeCoverItemClass: 'app-theme-cover-item',
        theme: {
            toggleAttr: 'data-toggle="theme-selector"',
            classAttr: 'data-theme-class',
            cookieName: 'app-theme',
            activeClass: 'active'
        },
        themeCover: {
            toggleAttr: 'data-toggle="theme-cover-selector"',
            classAttr: 'data-theme-cover-class',
            cookieName: 'app-theme-cover',
            activeClass: 'active'
        }
    },
    dismissClass: {
        toggleAttr: 'data-dismiss-class',
        targetAttr: 'data-dismiss-target'
    },
    toggleClass: {
        toggleAttr: 'data-toggle-class',
        targetAttr: 'data-toggle-target'
    },
    font: {
        family: (getComputedStyle(document.body).getPropertyValue('--bs-body-font-family')).trim(),
        size: (getComputedStyle(document.body).getPropertyValue('--bs-body-font-size')).trim(),
        weight: (getComputedStyle(document.body).getPropertyValue('--bs-body-font-weight')).trim()
    },
    color: {
        theme: (getComputedStyle(document.body).getPropertyValue('--bs-theme')).trim(),
        blue: (getComputedStyle(document.body).getPropertyValue('--bs-blue')).trim(),
        green: (getComputedStyle(document.body).getPropertyValue('--bs-green')).trim(),
        orange: (getComputedStyle(document.body).getPropertyValue('--bs-orange')).trim(),
        red: (getComputedStyle(document.body).getPropertyValue('--bs-red')).trim(),
        cyan: (getComputedStyle(document.body).getPropertyValue('--bs-cyan')).trim(),
        purple: (getComputedStyle(document.body).getPropertyValue('--bs-purple')).trim(),
        yellow: (getComputedStyle(document.body).getPropertyValue('--bs-yellow')).trim(),
        indigo: (getComputedStyle(document.body).getPropertyValue('--bs-indigo')).trim(),
        pink: (getComputedStyle(document.body).getPropertyValue('--bs-pink')).trim(),
        black: (getComputedStyle(document.body).getPropertyValue('--bs-black')).trim(),
        white: (getComputedStyle(document.body).getPropertyValue('--bs-white')).trim(),
        gray: (getComputedStyle(document.body).getPropertyValue('--bs-gray')).trim(),
        dark: (getComputedStyle(document.body).getPropertyValue('--bs-dark')).trim(),
        gray100: (getComputedStyle(document.body).getPropertyValue('--bs-gray-100')).trim(),
        gray200: (getComputedStyle(document.body).getPropertyValue('--bs-gray-200')).trim(),
        gray300: (getComputedStyle(document.body).getPropertyValue('--bs-gray-300')).trim(),
        gray400: (getComputedStyle(document.body).getPropertyValue('--bs-gray-400')).trim(),
        gray500: (getComputedStyle(document.body).getPropertyValue('--bs-gray-500')).trim(),
        gray600: (getComputedStyle(document.body).getPropertyValue('--bs-gray-600')).trim(),
        gray700: (getComputedStyle(document.body).getPropertyValue('--bs-gray-700')).trim(),
        gray800: (getComputedStyle(document.body).getPropertyValue('--bs-gray-800')).trim(),
        gray900: (getComputedStyle(document.body).getPropertyValue('--bs-gray-900')).trim(),

        themeRgb: (getComputedStyle(document.body).getPropertyValue('--bs-theme-rgb')).trim(),
        blueRgb: (getComputedStyle(document.body).getPropertyValue('--bs-blue-rgb')).trim(),
        greenRgb: (getComputedStyle(document.body).getPropertyValue('--bs-green-rgb')).trim(),
        orangeRgb: (getComputedStyle(document.body).getPropertyValue('--bs-orange-rgb')).trim(),
        redRgb: (getComputedStyle(document.body).getPropertyValue('--bs-red-rgb')).trim(),
        cyanRgb: (getComputedStyle(document.body).getPropertyValue('--bs-cyan-rgb')).trim(),
        purpleRgb: (getComputedStyle(document.body).getPropertyValue('--bs-purple-rgb')).trim(),
        yellowRgb: (getComputedStyle(document.body).getPropertyValue('--bs-yellow-rgb')).trim(),
        indigoRgb: (getComputedStyle(document.body).getPropertyValue('--bs-indigo-rgb')).trim(),
        pinkRgb: (getComputedStyle(document.body).getPropertyValue('--bs-pink-rgb')).trim(),
        blackRgb: (getComputedStyle(document.body).getPropertyValue('--bs-black-rgb')).trim(),
        whiteRgb: (getComputedStyle(document.body).getPropertyValue('--bs-white-rgb')).trim(),
        grayRgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-rgb')).trim(),
        darkRgb: (getComputedStyle(document.body).getPropertyValue('--bs-dark-rgb')).trim(),
        gray100Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-100-rgb')).trim(),
        gray200Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-200-rgb')).trim(),
        gray300Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-300-rgb')).trim(),
        gray400Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-400-rgb')).trim(),
        gray500Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-500-rgb')).trim(),
        gray600Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-600-rgb')).trim(),
        gray700Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-700-rgb')).trim(),
        gray800Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-800-rgb')).trim(),
        gray900Rgb: (getComputedStyle(document.body).getPropertyValue('--bs-gray-900-rgb')).trim()
    },
    card: {
        expand: {
            status: false,
            toggleAttr: 'data-toggle="card-expand"',
            toggleTitle: 'Expand / Compress',
            class: 'card-expand'
        }
    },
    init: {
        attr: 'data-init'
    }
};



/* 02. Handle Scrollbar
------------------------------------------------ */
// const handleScrollbar = function() {
//     "use strict";
//     const elms = document.querySelectorAll('['+ app.scrollBar.attr +']');
//
//     for (let i = 0; i < elms.length; i++) {
//         generateScrollbar(elms[i])
//     }
// };
// const generateScrollbar = function(elm) {
//     "use strict";
//
//     if (elm.scrollbarInit || (app.isMobile && elm.getAttribute(app.scrollBar.skipMobileAttr))) {
//         return;
//     }
//     elm.style.height = (!elm.getAttribute(app.scrollBar.heightAttr)) ? elm.offsetHeight : elm.getAttribute(app.scrollBar.heightAttr);
//     elm.scrollbarInit = true;
//
//     if(app.isMobile) {
//         elm.style.overflowX = 'scroll';
//     } else {
//         const dataWheelPropagation = (elm.getAttribute(app.scrollBar.wheelPropagationAttr)) ? elm.getAttribute(app.scrollBar.wheelPropagationAttr) : false;
//
//         if (elm.closest('.'+ app.sidebar.class) && elm.closest('.'+ app.sidebar.class).length !== 0) {
//             app.sidebar.scrollBar.dom = new PerfectScrollbar(elm, {
//                 wheelPropagation: dataWheelPropagation
//             });
//         } else {
//             new PerfectScrollbar(elm, {
//                 wheelPropagation: dataWheelPropagation
//             });
//         }
//     }
//     elm.setAttribute(app.init.attr, true);
// };



/* 03. Handle Sidebar Menu
------------------------------------------------ */
const handleSidebarMenuToggle = function(menus) {
    menus.map(function(menu) {
        menu.onclick = function(e) {
            e.preventDefault();
            const target = this.nextElementSibling;

            menus.map(function(m) {
                const otherTarget = m.nextElementSibling;
                if (otherTarget !== target) {
                    otherTarget.style.display = 'none';
                    otherTarget.closest('.'+ app.sidebar.menu.itemClass).classList.remove(app.sidebar.menu.expandClass);
                }
            });

            const targetItemElm = target.closest('.' + app.sidebar.menu.itemClass);

            if (targetItemElm.classList.contains(app.sidebar.menu.expandClass) || (targetItemElm.classList.contains(app.sidebar.menu.activeClass) && !target.style.display)) {
                targetItemElm.classList.remove(app.sidebar.menu.expandClass);
                target.style.display = 'none';
            } else {
                targetItemElm.classList.add(app.sidebar.menu.expandClass);
                target.style.display = 'block';
            }
        }
    });
};
const handleSidebarMenu = function () {
    "use strict";

    const menuBaseSelector = '.' + app.sidebar.class + ' .' + app.sidebar.menu.class + ' > .' + app.sidebar.menu.itemClass + '.' + app.sidebar.menu.hasSubClass;
    const submenuBaseSelector = ' > .' + app.sidebar.menu.submenu.class + ' > .' + app.sidebar.menu.itemClass + '.' + app.sidebar.menu.hasSubClass;

    // menu
    const menuLinkSelector = menuBaseSelector + ' > .' + app.sidebar.menu.itemLinkClass;
    const menus = [].slice.call(document.querySelectorAll(menuLinkSelector));
    handleSidebarMenuToggle(menus);

    // submenu lvl 1
    const submenuLvl1Selector = menuBaseSelector + submenuBaseSelector;
    const submenusLvl1 = [].slice.call(document.querySelectorAll(submenuLvl1Selector + ' > .' + app.sidebar.menu.itemLinkClass));
    handleSidebarMenuToggle(submenusLvl1);

    // submenu lvl 2
    const submenuLvl2Selector = menuBaseSelector + submenuBaseSelector + submenuBaseSelector;
    const submenusLvl2 = [].slice.call(document.querySelectorAll(submenuLvl2Selector + ' > .' + app.sidebar.menu.itemLinkClass));
    handleSidebarMenuToggle(submenusLvl2);
};


/* 04. Handle Sidebar Scroll Memory
------------------------------------------------ */
const handleSidebarScrollMemory = function () {
    if (!app.isMobile) {
        try {
            if (typeof (Storage) !== 'undefined' && typeof (localStorage) !== 'undefined') {
                const elm = document.querySelector('.' + app.sidebar.class + ' [' + app.scrollBar.attr + ']');

                if (elm) {
                    elm.onscroll = function () {
                        localStorage.setItem(app.sidebar.scrollBar.localStorage, this.scrollTop);
                    }
                    const defaultScroll = localStorage.getItem(app.sidebar.scrollBar.localStorage);
                    if (defaultScroll) {
                        document.querySelector('.' + app.sidebar.class + ' [' + app.scrollBar.attr + ']').scrollTop = defaultScroll;
                    }
                }
            }
        } catch (error) {
            console.log(error);
        }
    }
};


/* 05. Handle Card Action
------------------------------------------------ */
const handleCardAction = function () {
    "use strict";

    if (app.card.expand.status) {
        return false;
    }
    app.card.expand.status = true;

    // expand
    const expandTogglerList = [].slice.call(document.querySelectorAll('[' + app.card.expand.toggleAttr + ']'));
    const expandTogglerTooltipList = expandTogglerList.map(function (expandTogglerEl) {
        expandTogglerEl.onclick = function (e) {
            e.preventDefault();

            const target = this.closest('.card');
            const targetClass = app.card.expand.class;
            const targetTop = 40;

            if (document.body.classList.contains(targetClass) && target.classList.contains(targetClass)) {
                target.removeAttribute('style');
                target.classList.remove(targetClass);
                document.body.classList.remove(targetClass);
            } else {
                document.body.classList.add(targetClass);
                target.classList.add(targetClass);
            }

            window.dispatchEvent(new Event('resize'));
        };

        return new bootstrap.Tooltip(expandTogglerEl, {
            title: app.card.expand.toggleTitle,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });
};


/* 06. Handle Tooltip & Popover Activation
------------------------------------------------ */
const handelTooltipPopoverActivation = function () {
    "use strict";

    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[' + app.bootstrap.tooltip.attr + ']'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    const popoverTriggerList = [].slice.call(document.querySelectorAll('[' + app.bootstrap.popover.attr + ']'));
    const popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
};


/* 07. Handle Scroll to Top Button
------------------------------------------------ */
const handleScrollToTopButton = function () {
    "use strict";

    const elmTriggerList = [].slice.call(document.querySelectorAll('[' + app.scrollToTopBtn.toggleAttr + ']'));

    document.onscroll = function () {
        const doc = document.documentElement;
        const totalScroll = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
        const elmList = elmTriggerList.map(function (elm) {
            if (totalScroll >= app.scrollToTopBtn.heightShow) {
                if (!elm.classList.contains(app.scrollToTopBtn.showClass)) {
                    elm.classList.add(app.scrollToTopBtn.showClass);
                }
            } else {
                elm.classList.remove(app.scrollToTopBtn.showClass);
            }
        });

        const elm = document.querySelectorAll(app.id)[0];

        if (totalScroll > 0) {
            elm.classList.add(app.header.hasScrollClass);
        } else {
            elm.classList.remove(app.header.hasScrollClass);
        }
    }

    const elmList = elmTriggerList.map(function (elm) {
        elm.onclick = function (e) {
            e.preventDefault();

            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    });
};


/* 08. Handle hexToRgba
------------------------------------------------ */
const hexToRgba = function (hex, transparent = 1) {
    let c;
    if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
        c = hex.substring(1).split('');
        if (c.length === 3) {
            c = [c[0], c[0], c[1], c[1], c[2], c[2]];
        }
        c = '0x' + c.join('');
        return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
    }
    throw new Error('Bad Hex');
};


/* 09. Handle Scroll To
------------------------------------------------ */
const handleScrollTo = function () {
    const elmTriggerList = [].slice.call(document.querySelectorAll('[' + app.scrollTo.attr + ']'));
    const elmList = elmTriggerList.map(function (elm) {
        elm.onclick = function (e) {
            e.preventDefault();

            const targetAttr = (elm.getAttribute(app.scrollTo.target)) ? this.getAttribute(app.scrollTo.target) : this.getAttribute(app.scrollTo.linkTarget);
            const targetElm = document.querySelectorAll(targetAttr)[0];
            const targetHeader = document.querySelectorAll(app.header.id)[0];
            const targetHeight = targetHeader.offsetHeight;
            if (targetElm) {
                const targetTop = targetElm.offsetTop - targetHeight - 24;
                window.scrollTo({top: targetTop, behavior: 'smooth'});
            }
        }
    });
};


/* 10. Handle Toggle Class
------------------------------------------------ */
const handleToggleClass = function() {
    const elmList = [].slice.call(document.querySelectorAll('['+ app.toggleClass.toggleAttr +']'));

    elmList.map(function(elm) {
        elm.onclick = function(e) {
            e.preventDefault();

            const targetToggleClass = this.getAttribute(app.toggleClass.toggleAttr);
            const targetDismissClass = this.getAttribute(app.dismissClass.toggleAttr);
            const targetToggleElm = document.querySelector(this.getAttribute(app.toggleClass.targetAttr));

            if (!targetDismissClass) {
                if (targetToggleElm.classList.contains(targetToggleClass)) {
                    targetToggleElm.classList.remove(targetToggleClass);
                } else {
                    targetToggleElm.classList.add(targetToggleClass);
                }
            } else {
                if (!targetToggleElm.classList.contains(targetToggleClass) && !targetToggleElm.classList.contains(targetDismissClass)) {
                    if (targetToggleElm.classList.contains(targetToggleClass)) {
                        targetToggleElm.classList.remove(targetToggleClass);
                    } else {
                        targetToggleElm.classList.add(targetToggleClass);
                    }
                } else {
                    if (targetToggleElm.classList.contains(targetToggleClass)) {
                        targetToggleElm.classList.remove(targetToggleClass);
                    } else {
                        targetToggleElm.classList.add(targetToggleClass);
                    }
                    if (targetToggleElm.classList.contains(targetDismissClass)) {
                        targetToggleElm.classList.remove(targetDismissClass);
                    } else {
                        targetToggleElm.classList.add(targetDismissClass);
                    }
                }
            }
        }
    });
}

const Cookies = window.cookies;

/* 11. Handle Theme Panel
------------------------------------------------ */
const handleThemePanel = function() {
    let targetElm;
    "use strict";

    // 12.1 Theme Panel - Toggle / Dismiss
    let elmList = [].slice.call(document.querySelectorAll('['+ app.themePanel.toggleAttr +']'));

    elmList.map(function(elm) {
        elm.onclick = function(e) {
            e.preventDefault();

            const targetContainer = document.querySelector('.'+ app.themePanel.class);
            let targetExpand = false;

            if (targetContainer.classList.contains(app.themePanel.activeClass)) {
                targetContainer.classList.remove(app.themePanel.activeClass);
            } else {
                targetContainer.classList.add(app.themePanel.activeClass);
                targetExpand = true;
            }
            if (Cookies) {
                Cookies.set(app.themePanel.cookieName, targetExpand);
            }
        }
    });

    // 12.2 Theme Panel - Page Load Cookies
    if (Cookies) {
        const themePanelExpand = Cookies.get(app.themePanel.cookieName);

        if (themePanelExpand === 'true' || typeof themePanelExpand == 'undefined') {
            const elm = document.querySelector('[' + app.themePanel.toggleAttr + ']');
            if (elm) {
                elm.click();
            }
        }
    }


    // 12.3 Theme Panel - Theme Selector
    elmList = [].slice.call(document.querySelectorAll('.'+ app.themePanel.class +' ['+ app.themePanel.theme.toggleAttr +']'));
    elmList.map(function(elm) {
        elm.onclick = function() {
            for (let x = 0; x < document.body.classList.length; x++) {
                const targetClass = document.body.classList[x];
                if (targetClass.search('theme-') > -1) {
                    document.body.classList.remove(targetClass);
                }
            }

            const targetTheme = this.getAttribute(app.themePanel.theme.classAttr);
            const targetThemeList = [].slice.call(document.querySelectorAll('.' + app.themePanel.class + ' [' + app.themePanel.theme.toggleAttr + ']'));

            if (targetTheme) {
                document.body.classList.add(targetTheme);
            }
            targetThemeList.map(function(targetElm) {
                if (targetElm.getAttribute(app.themePanel.theme.classAttr) !== targetTheme) {
                    targetElm.closest('.'+ app.themePanel.themeListItemCLass).classList.remove(app.themePanel.theme.activeClass);
                }
            });

            this.closest('.'+ app.themePanel.themeListItemCLass).classList.add(app.themePanel.theme.activeClass);

            if (Cookies) {
                Cookies.set(app.themePanel.theme.cookieName, targetTheme);
                app.color.theme = (getComputedStyle(document.body).getPropertyValue('--bs-theme')).trim();
                app.color.themeRgb = (getComputedStyle(document.body).getPropertyValue('--bs-theme-rgb')).trim();

                document.dispatchEvent(new Event('theme-reload'));
            }
        }
    });

    if (Cookies) {
        if (Cookies.get(app.themePanel.theme.cookieName)) {
            targetElm = document.querySelector('.'+ app.themePanel.class +' ['+ app.themePanel.theme.toggleAttr +']' + '['+ app.themePanel.theme.classAttr +'="'+ Cookies.get(app.themePanel.theme.cookieName) +'"]');
            targetElm.click();

            app.color.theme = (getComputedStyle(document.body).getPropertyValue('--bs-theme')).trim();
            app.color.themeRgb = (getComputedStyle(document.body).getPropertyValue('--bs-theme-rgb')).trim();

            document.dispatchEvent(new Event('theme-reload'));
        }
    }


    // 12.4 Theme Panel - Background Selector
    elmList = [].slice.call(document.querySelectorAll('.'+ app.themePanel.class +' ['+ app.themePanel.themeCover.toggleAttr +']'));
    elmList.map(function(elm) {
        elm.onclick = function(e) {
            e.preventDefault();

            const htmlElm = document.querySelector('html');
            const targetTheme = this.getAttribute(app.themePanel.themeCover.classAttr);
            for (let x = 0; x < document.documentElement.classList.length; x++) {
                const targetClass = document.documentElement.classList[x];
                if (targetClass.search('bg-cover-') > -1) {
                    htmlElm.classList.remove(targetClass);
                }
            }

            if (targetTheme) {
                htmlElm.classList.add(targetTheme);
            }

            const targetCoverList = [].slice.call(document.querySelectorAll('.' + app.themePanel.class + ' [' + app.themePanel.themeCover.toggleAttr + ']'));
            targetCoverList.map(function(targetElm) {
                if (targetElm.getAttribute(app.themePanel.themeCover.toggleAttr) != targetTheme) {
                    targetElm.closest('.'+ app.themePanel.themeCoverItemClass).classList.remove(app.themePanel.themeCover.activeClass);
                }
            });

            this.closest('.'+ app.themePanel.themeCoverItemClass).classList.add(app.themePanel.themeCover.activeClass);
            if (Cookies) {
                Cookies.set(app.themePanel.themeCover.cookieName, targetTheme);
            }
        };
    });

    if (Cookies) {
        if (Cookies.get(app.themePanel.themeCover.cookieName)) {
            targetElm = document.querySelector('.' + app.themePanel.class + ' [' + app.themePanel.themeCover.toggleAttr + ']' + '[' + app.themePanel.themeCover.classAttr + '="' + Cookies.get(app.themePanel.themeCover.cookieName) + '"]');
            if (targetElm) {
                targetElm.click();
            }
        }
    }
};



/* 12. Application Controller
------------------------------------------------ */
const App = function () {
    "use strict";

    return {
        //main function
        init: function () {
            this.initComponent();
            this.initSidebar();
        },
        initSidebar: function() {
            handleSidebarMenu();
            handleSidebarScrollMemory();
        },
        initComponent: function() {
            // handleScrollbar();
            handleScrollToTopButton();
            handleScrollTo();
            handleCardAction();
            handelTooltipPopoverActivation();
            handleToggleClass();
            handleThemePanel();
        },
        scrollTop: function() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    };
}();



/* 13. Initialise
------------------------------------------------ */
document.addEventListener('DOMContentLoaded', function() {
    App.init();
});
