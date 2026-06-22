const RATE_PER_KG = {
    sea: 1.10,
    air: 7.20,
    road: 2.60,
    rail: 1.75
};

const VOL_DIVISOR = {
    sea: 1000,
    air: 167,
    road: 500,
    rail: 800
};

const ORIGIN_MULT = {
    china: 1.00,
    russia: 0.78,
    germany: 0.88,
    usa: 1.38,
    uae: 0.81,
    italy: 0.85,
};

const DEST_MULT = {
    yerevan: 1.00,
    gyumri: 1.07,
    vanadzor: 1.11,
};

const CARGO_MULT = {
    general: 1.00,
    dangerous: 1.62,
    perishable: 1.42,
    oversized: 1.58,
};

const CUSTOMS_BASE = {
    sea: 180,
    air: 95,
    road: 130,
    rail: 150
};

const TRANSIT = {
    sea: [35, 45],
    air: [4, 8],
    road: [10, 18],
    rail: [18, 26],
};

const MIN_CHARGE = {
    sea: 450,
    air: 300,
    road: 260,
    rail: 370
};

const $from = document.getElementById('from');
const $to = document.getElementById('to');
const $mode = document.getElementById('mode');
const $cargo = document.getElementById('cargo');
const $weight = document.getElementById('weight');
const $volume = document.getElementById('volume');
const $weightVal = document.getElementById('weight-val');
const $volumeVal = document.getElementById('volume-val');
const $price = document.getElementById('price-range');
const $transit = document.getElementById('transit-time');
const $base = document.getElementById('base-charge');
const $customs = document.getElementById('customs-fee');
const $ins = document.getElementById('insurance-fee');
const $result = document.getElementById('result');

function syncTrack(el) {
    const pct = ((el.value - el.min) / (el.max - el.min) * 100).toFixed(2);
    el.style.setProperty('--pct', pct + '%');
}

function calculate() {
    const origin = $from.value;
    const dest = $to.value;
    const mode = $mode.value;
    const cargo = $cargo.value;
    const wKg = parseFloat($weight.value);
    const vCbm = parseFloat($volume.value);

    const volKg = vCbm * VOL_DIVISOR[mode];
    const chargeableKg = Math.max(wKg, volKg);

    const rawBase = Math.max(
        chargeableKg * RATE_PER_KG[mode] *
        ORIGIN_MULT[origin] *
        DEST_MULT[dest] *
        CARGO_MULT[cargo],
        MIN_CHARGE[mode]
    );

    const low = Math.round(rawBase * 0.92);
    const high = Math.round(rawBase * 1.09);

    const customsFee = Math.round(CUSTOMS_BASE[mode] * CARGO_MULT[cargo] * DEST_MULT[dest]);
    const insAmt = Math.round(rawBase * 0.038);

    const [tMin, tMax] = TRANSIT[mode];
    return {
        low,
        high,
        base: Math.round(rawBase),
        customsFee,
        insAmt,
        tMin,
        tMax
    };
}

let _timer = null;

function render() {
    $result.classList.add('result--updating');
    clearTimeout(_timer);
    _timer = setTimeout(() => {
        const {
            low,
            high,
            base,
            customsFee,
            insAmt,
            tMin,
            tMax
        } = calculate();
        $price.textContent = `USD $${low.toLocaleString()} \u2013 $${high.toLocaleString()}`;
        $transit.textContent = `${tMin}\u2013${tMax} days`;
        $base.textContent = `$${base.toLocaleString()}`;
        $customs.textContent = `$${customsFee.toLocaleString()}`;
        $ins.textContent = `$${insAmt.toLocaleString()}`;
        $result.classList.remove('result--updating');
    }, 110);
}

[$from, $to, $mode, $cargo].forEach(el => el.addEventListener('change', render));

$weight.addEventListener('input', () => {
    $weightVal.textContent = `${parseInt($weight.value).toLocaleString()} kg`;
    syncTrack($weight);
    render();
});

$volume.addEventListener('input', () => {
    const v = parseFloat($volume.value);
    $volumeVal.textContent = `${Number.isInteger(v) ? v : v.toFixed(1)} CBM`;
    syncTrack($volume);
    render();
});

syncTrack($weight);
syncTrack($volume);
render();


var swiper = new Swiper(".partners", {

    loop: true,
    spaceBetween: 30,
    speed: 1000,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
    },

    breakpoints: {
        320: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 30
        },
        1250: {
            slidesPerView: 9,
            spaceBetween: 80
        }
    }
});

// Tracker

const SHIPMENTS = {
    'CIO-DE-3029': {
        id: 'CIO-DE-3029', status: 'delivered',
        route: 'Frankfurt, DE → Yerevan, AM', eta: 'Delivered',
        weight: '420 kg', mode: 'Air Freight (GDP Cold-Chain)',
        steps: [
            { title: 'Picked Up', desc: 'Frankfurt Airport Warehouse GDP Acceptance', time: 'May 16, 09:15 AM', done: true },
            { title: 'Export Customs Cleared', desc: 'Frankfurt Customs Authorities Release', time: 'May 17, 11:30 AM', done: true },
            { title: 'Flight Departed', desc: 'LH-1568 departed Frankfurt Cargo', time: 'May 18, 02:40 PM', done: true },
            { title: 'Arrived Yerevan (EVN)', desc: 'Zvartnots cargo terminal intake, temperature 4°C verified', time: 'May 18, 09:10 PM', done: true },
            { title: 'Customs Cleared', desc: 'Import procedures completed under GDP guidelines', time: 'May 19, 10:00 AM', done: true },
            { title: 'Delivered', desc: 'Handed over to PharmaCorp Yerevan HQ. Temp logs signed.', time: 'May 19, 02:15 PM', done: true },
        ]
    },
    'CIO-AM-1104': {
        id: 'CIO-AM-1104', status: 'in-transit',
        route: 'Amsterdam, NL → Yerevan, AM', eta: 'Jun 22, 2026',
        weight: '210 kg', mode: 'Air Freight (Cold-Chain)',
        steps: [
            { title: 'Picked Up', desc: 'AMS Cargo Hub Acceptance', time: 'Jun 19, 07:00 AM', done: true },
            { title: 'Export Customs Cleared', desc: 'Dutch Customs Release', time: 'Jun 19, 10:45 AM', done: true },
            { title: 'Flight Departed', desc: 'KL-0781 departed Amsterdam Schiphol', time: 'Jun 19, 14:20 PM', done: true },
            { title: 'Arrived Yerevan (EVN)', desc: 'Awaiting cargo terminal intake', time: 'Est. Jun 20', done: false },
            { title: 'Customs Clearance', desc: 'Pending import procedures', time: 'Est. Jun 21', done: false },
            { title: 'Delivery', desc: 'Scheduled delivery to consignee', time: 'Est. Jun 22', done: false },
        ]
    }
};

const input = document.getElementById('trackingInput');
const trackBtn = document.getElementById('trackBtn');
const errorMsg = document.getElementById('errorMsg');
const skeleton = document.getElementById('skeleton');
const body = document.getElementById('trackerBody');
const shipmentId = document.getElementById('shipmentId');
const statusBadge = document.getElementById('statusBadge');
const metaRoute = document.getElementById('metaRoute');
const metaEta = document.getElementById('metaEta');
const metaWeight = document.getElementById('metaWeight');
const metaMode = document.getElementById('metaMode');
const timeline = document.getElementById('timeline');

const CHECK_SVG = `<svg viewBox="0 0 14 14" aria-hidden="true"><polyline points="2,7 5.5,10.5 12,3.5"/></svg>`;

const showError = msg => {
    errorMsg.textContent = msg;
    errorMsg.classList.add('tracker__header__error-msg--visible');
    input.classList.add('tracker__header__input--error');
};
const clearError = () => {
    errorMsg.classList.remove('tracker__header__error-msg--visible');
    input.classList.remove('tracker__header__input--error');
};
const showSkeleton = () => skeleton.classList.add('tracker__skeleton--visible');
const hideSkeleton = () => skeleton.classList.remove('tracker__skeleton--visible');
const showResult = () => body.classList.add('tracker__body--visible');
const hideResult = () => body.classList.remove('tracker__body--visible');

function renderStep(step) {
    const li = document.createElement('li');
    li.className = 'tracker__body__step' + (step.done ? ' tracker__body__step--done' : '');
    li.innerHTML = `
      <div class="tracker__body__step__marker${step.done ? '' : ' tracker__body__step__marker--pending'}"
           aria-label="${step.done ? 'Completed' : 'Pending'}">
        ${CHECK_SVG}
      </div>
      <div class="tracker__body__step__content">
        <div>
          <p class="tracker__body__step__title">${step.title}</p>
          <p class="tracker__body__step__desc">${step.desc}</p>
        </div>
        <time class="tracker__body__step__time">${step.time}</time>
      </div>`;
    return li;
}

function renderShipment(data) {
    shipmentId.textContent = data.id;
    metaRoute.textContent = data.route;
    metaEta.textContent = data.eta;
    metaWeight.textContent = data.weight;
    metaMode.textContent = data.mode;

    const BADGES = {
        'delivered': { text: 'Delivered', mod: 'tracker__body__badge--delivered' },
        'in-transit': { text: 'In Transit', mod: 'tracker__body__badge--in-transit' },
        'pending': { text: 'Pending', mod: 'tracker__body__badge--pending' },
    };
    const b = BADGES[data.status] || BADGES['pending'];
    statusBadge.textContent = b.text;
    statusBadge.className = `tracker__body__badge ${b.mod}`;

    timeline.innerHTML = '';
    data.steps.forEach(s => timeline.appendChild(renderStep(s)));
    showResult();
}

const fetchShipment = id => new Promise((resolve, reject) =>
    setTimeout(() => {
        const data = SHIPMENTS[id.toUpperCase()];
        data ? resolve(data) : reject();
    }, 850)
);

async function handleTrack() {
    const query = input.value.trim();
    clearError();
    hideResult();

    if (!query) {
        showError('Please enter a tracking number.');
        input.focus();
        return;
    }

    showSkeleton();
    trackBtn.disabled = true;
    trackBtn.textContent = 'Searching…';

    try {
        renderShipment(await fetchShipment(query));
    } catch {
        showError(`No shipment found for "${query}". Try CIO-DE-3029 or CIO-AM-1104.`);
    } finally {
        hideSkeleton();
        trackBtn.disabled = false;
        trackBtn.textContent = 'Track Shipment';
    }
}

trackBtn.addEventListener('click', handleTrack);
input.addEventListener('keydown', e => { if (e.key === 'Enter') handleTrack(); });
input.addEventListener('input', () => {
    if (input.classList.contains('tracker__header__input--error')) clearError();
});


gsap.registerPlugin(ScrollTrigger);

let items = document.querySelectorAll('.steps-listing__item');

items.forEach(function (item, i) {
    let isOdd = i % 2 === 0;
    let info = item.querySelector('.steps-listing__info');
    let icon = item.querySelector('.steps-listing__icon');
    let line = item.querySelector('.animated-line');

    let nativeTimeline = gsap.timeline({
        scrollTrigger: {
            trigger: item,
            start: 'top 55%',
            toggleActions: 'play none none reverse'
        }
    });

    nativeTimeline.fromTo(info,
        { opacity: 0, x: isOdd ? -40 : 40 },
        { opacity: 1, x: 0, duration: 0.55, ease: 'power3.out' }
    );

    nativeTimeline.fromTo(icon,
        { opacity: 0, x: isOdd ? 40 : -40, scale: 0.8 },
        { opacity: 1, x: 0, scale: 1, duration: 0.5, ease: 'back.out(1.6)' },
        '-=0.35'
    );

    if (line) {
        nativeTimeline.to({}, {
            duration: 0.8,
            onStart: function () {
                line.classList.add('is-animated');
            },
            onReverseStart: function () {
                line.classList.remove('is-animated');
            },
            onComplete: function () {
                line.classList.add('is-animated');
            },
            onReverseComplete: function () {
                line.classList.remove('is-animated');
            }
        }, '-=0.1');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    let faqItems = document.querySelectorAll('.section-faq__item');

    faqItems.forEach(function (item) {
        let trigger = item.querySelector('.section-faq__trigger');
        let panel = item.querySelector('.section-faq__panel');

        trigger.addEventListener('click', function () {
            let isOpen = item.classList.contains('is-open');

            faqItems.forEach(function (otherItem) {
                if (otherItem !== item && otherItem.classList.contains('is-open')) {
                    let otherPanel = otherItem.querySelector('.section-faq__panel');

                    otherItem.classList.remove('is-open');
                    gsap.to(otherPanel, {
                        height: 0,
                        duration: 0.4,
                        ease: 'power2.out',
                        onComplete: function () {
                            gsap.set(otherPanel, { clearProps: 'visibility' });
                        }
                    });
                }
            });


            if (isOpen) {
                item.classList.remove('is-open');
                gsap.to(panel, {
                    height: 0,
                    duration: 0.4,
                    ease: 'power2.out',
                    onComplete: function () {
                        gsap.set(panel, { clearProps: 'visibility' });
                    }
                });
            } else {
                item.classList.add('is-open');
                gsap.set(panel, { visibility: 'visible' });

                gsap.to(panel, {
                    height: 'auto',
                    duration: 0.45,
                    ease: 'power2.out'
                });
            }
        });
    });
});

// menu Toggle

document.addEventListener('DOMContentLoaded', function () {
    var hamburger = document.querySelector('.hamburger');
    var navigation = document.querySelector('.app-navigation');
    var body = document.body; // Cache the body element

    if (hamburger && navigation) {
        hamburger.addEventListener('click', function () {
            var isOpen = hamburger.classList.toggle('is-active');
            navigation.classList.toggle('is-active');

            if (isOpen) {
                body.style.overflow = 'hidden';
            } else {
                body.style.overflow = '';
            }

            hamburger.setAttribute('aria-expanded', isOpen);
        });


        document.addEventListener('click', function (event) {
            if (!navigation.contains(event.target) && !hamburger.contains(event.target)) {
                hamburger.classList.remove('is-active');
                navigation.classList.remove('is-active');
                body.style.overflow = '';
                hamburger.setAttribute('aria-expanded', 'false');
            }
        });
    }
});

AOS.init({
    duration: 800, 
    once: true,
});

