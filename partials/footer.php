<div class="footer-section footer_section2">
    <div class="container">
        <div class="row">

            <!-- Sitemap -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="2000">
                <div class="footer_section__title">
                    <h2 class="getintouch2"> Sitemap </h2>
                </div>
                <div class="footer_section__link">
                    <a href="index.php">Home</a>
                </div>
                <div class="footer_section__link">
                    <a href="company-overview.php">Company Overview</a>
                </div>
                <div class="footer_section__link">
                    <a href="our-history.php">Our History</a>
                </div>
                <div class="footer_section__link">
                    <a href="sustainability.php">Sustainability</a>
                </div>
                <div class="footer_section__link">
                    <a href="why-us.php">Why Choose Us</a>
                </div>
                <div class="footer_section__link">
                    <a href="quality-assurance.php">Quality Assurance</a>
                </div>
                <div class="footer_section__link">
                    <a href="facility.php">Facility</a>
                </div>
                <div class="footer_section__link">
                    <a href="contact-us.php">Contact Us</a>
                </div> 

            </div>

            <!-- Products -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="2000">
                <div class="footer_section__title">
                    <h2 class="getintouch2"> Our Products </h2>
                </div>
                <div class="footer_section__link">
                    <!-- <a href="cip-alkaline-detergent.php">CIP Alkaline Detergent</a> -->
                    <a href="hemtop-degreasing-solution.php">Hemtop Industrial Cleaner</a>
                    <a href="hemtop-plus.php">Hemtop Plus</a>
                    <a id="n" href="hemec-4.php">Hemec-4</a>
                </div>
            </div>

            <!-- Contact -->
            <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-duration="2000">
                <div class="footer_section__title">
                    <h2 class="getintouch"> Get In Touch </h2>
                </div>
                <div class="footer_section__link">
                    <div class="footer-address-item mb-2">
                        <strong style="color: #fff; font-size: 14px;"><i class="fa fa-building mr-1"></i> Registered Office:</strong><br>
                        <a href="https://maps.app.goo.gl/f2YKqggacwhsatk16" target="_blank" style="display: block; padding-left: 20px;">
                            13, Vasundhara Park Society, Opposite Delux Colony, Nizampura, Vadodara – 390002, Gujarat, India
                        </a>
                    </div>
                    <div class="footer-address-item mb-2">
                        <strong style="color: #fff; font-size: 14px;"><i class="fa fa-industry mr-1"></i> Godown Address:</strong><br>
                        <a href="https://www.google.com/maps/search/?api=1&query=Survery+No.+503%2F3%2C+Omakarpura%2C+Sokhda+Road%2C+Beside+Amar+Car+Godown%2C+Opposite+GSFC+Company+Gate%2C+Dashrath%2C+Vadodara-+391740%2C+Gujarat%2C+India" target="_blank" rel="noopener noreferrer" style="display: block; padding-left: 20px;">
                            Survery No. 503/3, Omakarpura, Sokhda Road, Beside Amar Car Godown, Opposite GSFC Company Gate, Dashrath, Vadodara- 391740, Gujarat, India
                        </a>
                    </div>
                    <div class="mt-2">
                        <a href="tel:+919898028467">
                            <i class="fa fa-phone"></i> +91 9898028467
                        </a>
                        <a href="tel:+919409025703">
                            <i class="fa fa-phone"></i> +91 9409025703
                        </a>
                        <a href="mailto:tacitenterprise@hotmail.com">
                            <i class="fa fa-envelope"></i> tacitenterprise@hotmail.com
                        </a>
                        <a href="mailto:info@tacitenterprise.com">
                            <i class="fa fa-envelope"></i> info@tacitenterprise.com
                        </a>
                    </div>
                </div>

                <div class="st__social__icon">
                    <a href="#" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="copyright-text">
                    © Tacit Enterprise <?php echo date("Y"); ?>.<br>
                    All Rights Reserved.<br>
                    Designed & Developed by<br>
                    <a href="https://nexxoorysolutions.com/" target="_blank">
                        Nexxoory Solutions Pvt. Ltd.
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js'></script>
<!-- GSAP 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="js/custom.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
	"use strict";

	const tacitSlider = document.getElementById("tacitVerticalSlider");

	if (!tacitSlider || typeof gsap === "undefined") {
		return;
	}

	const tacitSlides = Array.from(
		tacitSlider.querySelectorAll(".tacit-vfs-slide")
	);

	const tacitTabsContainer = tacitSlider.querySelector(".tacit-vfs-tabs");
	const tacitPreviousButton = tacitSlider.querySelector(".tacit-vfs-arrow-up");
	const tacitNextButton = tacitSlider.querySelector(".tacit-vfs-arrow-down");
	const tacitPlayPauseButton = tacitSlider.querySelector(".tacit-vfs-playpause");
	const tacitProgressBar = document.getElementById("tacitAutoplayProgress");
	const tacitCurrentCounter = tacitSlider.querySelector(".tacit-vfs-current");
	const tacitTotalCounter = tacitSlider.querySelector(".tacit-vfs-total");

	if (!tacitSlides.length) {
		return;
	}

	let tacitCurrentIndex = 0;
	let tacitIsAnimating = false;
	let tacitWheelLocked = false;
	let tacitAutoplayTimer = null;
	let tacitProgressTween = null;
	let tacitIsPlaying = true;
	const slideIntervalSeconds = 6.0;

	let tacitPointerStartY = 0;
	let tacitPointerCurrentY = 0;
	let tacitPointerStartTime = 0;
	let tacitIsPointerDown = false;

	const tacitSwipeDistance = 50;
	const tacitSlideDuration = 0.95;

	if (tacitTotalCounter) {
		tacitTotalCounter.textContent = String(tacitSlides.length).padStart(2, "0");
	}

	/* Build Interactive Tab Selectors */
	if (tacitTabsContainer) {
		tacitTabsContainer.innerHTML = "";
		tacitSlides.forEach(function (slide, index) {
			const title = slide.getAttribute("data-title") || "Formulation " + (index + 1);
			const category = slide.getAttribute("data-category") || "";

			const tab = document.createElement("button");
			tab.type = "button";
			tab.className = "tacit-vfs-tab" + (index === 0 ? " active" : "");
			tab.setAttribute("role", "tab");
			tab.setAttribute("aria-selected", index === 0 ? "true" : "false");
			tab.innerHTML = `<span class="tacit-vfs-tab-num">0${index + 1}.</span> <span class="tacit-vfs-tab-text">${title}</span>`;

			tab.addEventListener("click", function () {
				tacitGoToSlide(index);
				if (tacitIsPlaying) restartAutoplay();
			});

			tacitTabsContainer.appendChild(tab);
		});
	}

	const tacitTabs = Array.from(tacitSlider.querySelectorAll(".tacit-vfs-tab"));

	/* Initial Setup for Slides */
	tacitSlides.forEach(function (slide, index) {
		const content = slide.querySelector(".tacit-vfs-content-inner");
		const image = slide.querySelector(".tacit-vfs-image");
		const hud = slide.querySelector(".tacit-vfs-hud");

		gsap.set(slide, {
			yPercent: index === 0 ? 0 : 100,
			autoAlpha: index === 0 ? 1 : 0
		});

		if (content) {
			const elements = content.children;
			gsap.set(elements, {
				y: index === 0 ? 0 : 35,
				autoAlpha: index === 0 ? 1 : 0
			});
		}

		if (hud) {
			gsap.set(hud, {
				y: index === 0 ? 0 : 40,
				autoAlpha: index === 0 ? 1 : 0,
				scale: index === 0 ? 1 : 0.95
			});
		}

		if (image) {
			gsap.set(image, {
				scale: index === 0 ? 1.04 : 1.14
			});
		}
	});

	tacitUpdateControls();
	startAutoplayProgress();

	function tacitGoToSlide(newIndex) {
		if (
			tacitIsAnimating ||
			newIndex === tacitCurrentIndex ||
			newIndex < 0 ||
			newIndex >= tacitSlides.length
		) {
			return;
		}

		tacitIsAnimating = true;

		const oldIndex = tacitCurrentIndex;
		const direction = newIndex > oldIndex ? 1 : -1;

		tacitCurrentIndex = newIndex;
		tacitUpdateControls();

		const oldSlide = tacitSlides[oldIndex];
		const newSlide = tacitSlides[newIndex];

		const oldContent = oldSlide.querySelector(".tacit-vfs-content-inner");
		const newContent = newSlide.querySelector(".tacit-vfs-content-inner");
		const oldImage = oldSlide.querySelector(".tacit-vfs-image");
		const newImage = newSlide.querySelector(".tacit-vfs-image");
		const oldHud = oldSlide.querySelector(".tacit-vfs-hud");
		const newHud = newSlide.querySelector(".tacit-vfs-hud");

		newSlide.classList.add("tacit-vfs-slide-active");

		gsap.set(newSlide, {
			yPercent: direction * 100,
			autoAlpha: 1,
			visibility: "visible"
		});

		if (newContent) {
			gsap.set(newContent.children, {
				y: direction * 45,
				autoAlpha: 0
			});
		}

		if (newHud) {
			gsap.set(newHud, {
				y: direction * 50,
				autoAlpha: 0,
				scale: 0.94
			});
		}

		if (newImage) {
			gsap.set(newImage, {
				scale: 1.15
			});
		}

		const timeline = gsap.timeline({
			defaults: { ease: "power3.inOut" },
			onComplete: function () {
				oldSlide.classList.remove("tacit-vfs-slide-active");

				gsap.set(oldSlide, {
					autoAlpha: 0,
					visibility: "hidden"
				});

				tacitIsAnimating = false;
			}
		});

		// Slide transitions
		timeline.to(oldSlide, { yPercent: direction * -100, duration: tacitSlideDuration }, 0);
		timeline.to(newSlide, { yPercent: 0, duration: tacitSlideDuration }, 0);

		// Old content exit
		if (oldContent) {
			timeline.to(oldContent.children, { y: direction * -35, autoAlpha: 0, duration: 0.4, stagger: 0.04, ease: "power2.in" }, 0);
		}
		if (oldHud) {
			timeline.to(oldHud, { y: direction * -30, autoAlpha: 0, scale: 0.94, duration: 0.4, ease: "power2.in" }, 0);
		}

		// New content entrance (staggered)
		if (newContent) {
			timeline.to(newContent.children, {
				y: 0,
				autoAlpha: 1,
				duration: 0.7,
				stagger: 0.08,
				ease: "power3.out"
			}, 0.35);
		}

		if (newHud) {
			timeline.to(newHud, {
				y: 0,
				autoAlpha: 1,
				scale: 1,
				duration: 0.75,
				ease: "back.out(1.4)"
			}, 0.45);
		}

		// Images zoom effect
		if (oldImage) {
			timeline.to(oldImage, { scale: 1.14, duration: tacitSlideDuration }, 0);
		}

		if (newImage) {
			timeline.to(newImage, { scale: 1.04, duration: 1.4, ease: "power2.out" }, 0.1);
		}

		if (tacitIsPlaying) {
			startAutoplayProgress();
		}
	}

	function startAutoplayProgress() {
		if (tacitProgressTween) {
			tacitProgressTween.kill();
		}
		if (tacitAutoplayTimer) {
			clearTimeout(tacitAutoplayTimer);
		}

		if (tacitProgressBar) {
			gsap.set(tacitProgressBar, { width: "0%" });
			tacitProgressTween = gsap.to(tacitProgressBar, {
				width: "100%",
				duration: slideIntervalSeconds,
				ease: "none"
			});
		}

		tacitAutoplayTimer = setTimeout(function () {
			if (tacitIsPlaying && !tacitIsAnimating) {
				tacitNextSlide();
			}
		}, slideIntervalSeconds * 1000);
	}

	function restartAutoplay() {
		if (tacitIsPlaying) {
			startAutoplayProgress();
		}
	}

	function pauseAutoplay() {
		if (tacitProgressTween) {
			tacitProgressTween.pause();
		}
		if (tacitAutoplayTimer) {
			clearTimeout(tacitAutoplayTimer);
		}
	}

	function resumeAutoplay() {
		if (!tacitIsPlaying) return;
		if (tacitProgressTween) {
			tacitProgressTween.resume();
		}
		const currentProgress = tacitProgressBar ? (parseFloat(tacitProgressBar.style.width) || 0) : 0;
		const remainingTime = Math.max((1 - currentProgress / 100) * slideIntervalSeconds, 0.5);

		tacitAutoplayTimer = setTimeout(function () {
			if (tacitIsPlaying && !tacitIsAnimating) {
				tacitNextSlide();
			}
		}, remainingTime * 1000);
	}

	function tacitNextSlide() {
		const nextIndex = tacitCurrentIndex === tacitSlides.length - 1 ? 0 : tacitCurrentIndex + 1;
		tacitGoToSlide(nextIndex);
	}

	function tacitPreviousSlide() {
		const previousIndex = tacitCurrentIndex === 0 ? tacitSlides.length - 1 : tacitCurrentIndex - 1;
		tacitGoToSlide(previousIndex);
	}

	function tacitUpdateControls() {
		tacitSlides.forEach(function (slide, index) {
			slide.setAttribute("aria-hidden", index === tacitCurrentIndex ? "false" : "true");
		});

		tacitTabs.forEach(function (tab, index) {
			const isActive = index === tacitCurrentIndex;
			tab.classList.toggle("active", isActive);
			tab.setAttribute("aria-selected", isActive ? "true" : "false");
		});

		if (tacitCurrentCounter) {
			tacitCurrentCounter.textContent = String(tacitCurrentIndex + 1).padStart(2, "0");
		}
	}

	// Play / Pause Button Listener
	if (tacitPlayPauseButton) {
		tacitPlayPauseButton.addEventListener("click", function () {
			tacitIsPlaying = !tacitIsPlaying;
			const icon = tacitPlayPauseButton.querySelector("i");
			if (tacitIsPlaying) {
				if (icon) {
					icon.className = "fas fa-pause";
				}
				tacitPlayPauseButton.setAttribute("aria-label", "Pause slider autoplay");
				startAutoplayProgress();
			} else {
				if (icon) {
					icon.className = "fas fa-play";
				}
				tacitPlayPauseButton.setAttribute("aria-label", "Resume slider autoplay");
				pauseAutoplay();
			}
		});
	}

	// Next / Previous Buttons
	if (tacitNextButton) {
		tacitNextButton.addEventListener("click", function () {
			tacitNextSlide();
			if (tacitIsPlaying) restartAutoplay();
		});
	}

	if (tacitPreviousButton) {
		tacitPreviousButton.addEventListener("click", function () {
			tacitPreviousSlide();
			if (tacitIsPlaying) restartAutoplay();
		});
	}

	// Pause on hover
	tacitSlider.addEventListener("mouseenter", function () {
		if (tacitIsPlaying) pauseAutoplay();
	});

	tacitSlider.addEventListener("mouseleave", function () {
		if (tacitIsPlaying) resumeAutoplay();
	});

	// Smart Wheel Navigation
	tacitSlider.addEventListener("wheel", function (event) {
		if (tacitWheelLocked || tacitIsAnimating) {
			event.preventDefault();
			return;
		}
		if (Math.abs(event.deltaY) < 18) return;

		const rect = tacitSlider.getBoundingClientRect();
		const mouseY = event.clientY - rect.top;
		const sliderHeight = rect.height;

		// If mouse is near very top or bottom, allow page scroll
		if (mouseY < sliderHeight * 0.12 || mouseY > sliderHeight * 0.88) {
			return;
		}

		if (tacitCurrentIndex === tacitSlides.length - 1 && event.deltaY > 0) {
			return;
		}

		if (tacitCurrentIndex === 0 && event.deltaY < 0) {
			return;
		}

		event.preventDefault();
		tacitWheelLocked = true;
		if (event.deltaY > 0) {
			tacitNextSlide();
		} else {
			tacitPreviousSlide();
		}
		if (tacitIsPlaying) restartAutoplay();

		window.setTimeout(function () { tacitWheelLocked = false; }, 900);
	}, { passive: false });

	// Keyboard Navigation
	tacitSlider.addEventListener("keydown", function (event) {
		if (["ArrowDown", "PageDown", "ArrowRight"].includes(event.key)) {
			event.preventDefault();
			tacitNextSlide();
			if (tacitIsPlaying) restartAutoplay();
		}
		if (["ArrowUp", "PageUp", "ArrowLeft"].includes(event.key)) {
			event.preventDefault();
			tacitPreviousSlide();
			if (tacitIsPlaying) restartAutoplay();
		}
		if (event.key === "Home") {
			event.preventDefault();
			tacitGoToSlide(0);
			if (tacitIsPlaying) restartAutoplay();
		}
		if (event.key === "End") {
			event.preventDefault();
			tacitGoToSlide(tacitSlides.length - 1);
			if (tacitIsPlaying) restartAutoplay();
		}
	});

	// Touch & Pointer Drag Gestures
	tacitSlider.addEventListener("pointerdown", function (event) {
		if (event.target.closest("a") || event.target.closest("button")) return;
		tacitIsPointerDown = true;
		tacitPointerStartY = event.clientY;
		tacitPointerCurrentY = event.clientY;
		tacitPointerStartTime = Date.now();
		tacitSlider.classList.add("tacit-vfs-is-dragging");
		if (tacitSlider.setPointerCapture) tacitSlider.setPointerCapture(event.pointerId);
		if (tacitIsPlaying) pauseAutoplay();
	});

	tacitSlider.addEventListener("pointermove", function (event) {
		if (!tacitIsPointerDown || tacitIsAnimating) return;
		tacitPointerCurrentY = event.clientY;
		const distance = tacitPointerCurrentY - tacitPointerStartY;
		const currentSlide = tacitSlides[tacitCurrentIndex];
		const currentContent = currentSlide.querySelector(".tacit-vfs-content-inner");
		gsap.to(currentSlide, { y: distance * 0.15, duration: 0.15, ease: "none", overwrite: true });
		if (currentContent) {
			gsap.to(currentContent, { y: distance * 0.08, duration: 0.15, ease: "none", overwrite: true });
		}
	});

	function tacitEndPointerDrag(event) {
		if (!tacitIsPointerDown) return;
		tacitIsPointerDown = false;
		tacitSlider.classList.remove("tacit-vfs-is-dragging");
		const dragDistance = tacitPointerCurrentY - tacitPointerStartY;
		const dragTime = Math.max(Date.now() - tacitPointerStartTime, 1);
		const dragVelocity = Math.abs(dragDistance / dragTime);
		const currentSlide = tacitSlides[tacitCurrentIndex];
		const currentContent = currentSlide.querySelector(".tacit-vfs-content-inner");
		gsap.set(currentSlide, { y: 0 });
		if (currentContent) gsap.set(currentContent, { y: 0 });

		const shouldChangeSlide = Math.abs(dragDistance) >= tacitSwipeDistance || dragVelocity > 0.65;
		if (!shouldChangeSlide) {
			gsap.fromTo(currentSlide, { y: dragDistance * 0.15 }, { y: 0, duration: 0.35, ease: "back.out(1.8)" });
			if (tacitIsPlaying) resumeAutoplay();
			return;
		}

		if (dragDistance < 0) {
			tacitNextSlide();
		} else {
			tacitPreviousSlide();
		}

		if (tacitIsPlaying) restartAutoplay();

		if (event && tacitSlider.releasePointerCapture && tacitSlider.hasPointerCapture(event.pointerId)) {
			tacitSlider.releasePointerCapture(event.pointerId);
		}
	}

	tacitSlider.addEventListener("pointerup", tacitEndPointerDrag);
	tacitSlider.addEventListener("pointercancel", tacitEndPointerDrag);
	tacitSlider.addEventListener("pointerleave", function (event) {
		if (tacitIsPointerDown && event.pointerType === "mouse") {
			tacitEndPointerDrag(event);
		}
	});
});
</script>
<script>
  if (typeof AOS !== 'undefined') AOS.init();
</script>
</html>
