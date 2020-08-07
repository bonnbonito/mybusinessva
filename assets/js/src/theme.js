"use strict";

document.addEventListener('DOMContentLoaded', function () {
	var header = document.querySelector(".menu-section");
	var headroom = new Headroom(header, {
		offset: 56
	});
	headroom.init();
	var scrollpos = window.scrollY;
	var emailPopup = document.querySelector("#email-popup");
	window.addEventListener('scroll', function () {
		scrollpos = window.scrollY;

		if (scrollpos >= 300) {
			emailPopup.classList.add('show');
		} else {
			emailPopup.classList.remove('show');
		}
	});
	var modalTriggers = document.querySelectorAll('.popup-trigger');
	var modalCloseTrigger = document.querySelector('.popup-modal__close');
	var bodyBlackout = document.querySelector('.body-blackout');
	modalTriggers.forEach(function (trigger) {
		trigger.addEventListener('click', function () {
			var popupTrigger = trigger.dataset.popupTrigger;
			var popupModal = document.querySelector("[data-popup-modal=\"".concat(popupTrigger, "\"]"));
			popupModal.classList.add('is--visible');
			bodyBlackout.classList.add('is-blacked-out');
			popupModal.querySelector('.popup-modal__close').addEventListener('click', function () {
				popupModal.classList.remove('is--visible');
				bodyBlackout.classList.remove('is-blacked-out');
			});
			bodyBlackout.addEventListener('click', function () {
				// TODO: Turn into a function to close modal
				popupModal.classList.remove('is--visible');
				bodyBlackout.classList.remove('is-blacked-out');
			});
		});
	});
	document.addEventListener('click', function (e) {
		if (document.querySelector('body').classList.contains('menu-on')) {
			if (e.target.id != 'topnav' && e.target.id != 'menu-toggle') {
				document.getElementById('site-navigation').classList.remove('toggled');
				document.getElementById('menu-toggle').setAttribute('aria-expanded', 'false');
				document.getElementById('site-navigation').getElementsByTagName('ul')[0].setAttribute('aria-expanded', 'false');
				document.querySelector('body').classList.remove('menu-on');
			}
		}
	});
	var linkToggle = document.querySelectorAll('.js-toggle');
	linkToggle.forEach(function (toggle) {
		toggle.addEventListener('click', function (event) {
			event.preventDefault();
			toggle.classList.toggle('active');
			var container = document.getElementById(this.dataset.container);

			if (!container.classList.contains('active')) {
				container.classList.add('active');
				container.style.height = 'auto';
				var height = container.clientHeight + 'px';
				container.style.height = '0px';
				setTimeout(function () {
					container.style.height = height;
				}, 0);
			} else {
				container.style.height = '0px';
				container.addEventListener('transitionend', function () {
					container.classList.remove('active');
				}, {
					once: true
				});
			}
		});
	});
});
