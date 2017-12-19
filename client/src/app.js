import 'babel-polyfill';
import WebFont from 'webfontloader';
import multipleRender from 'react-multiple-render';
import 'lazysizes';
import 'lazysizes/plugins/bgset/ls.bgset.min';
import mitt from 'mitt';

import { runEvents } from './lib/events';

//  React components :)
import ContactForm from './components/contactPray';
import HeaderSlider from './components/headerSlider';
import sectionVideo from './components/sectionVideo';
import sectionVideoContent from './components/sectionVideoContent';
import Projects from './components/projects';
import ProjectsInfo from './components/projectsInfo';
import Accordion from './components/accordion';
import Posts from './components/posts';

import Donate from './components/donate/single';
import DonateInline from './components/donate/inline';
import DonateInlineSection from './components/donate/inline_section';
import DonateSection from './components/donate/section';

import CampaignsSlider from './components/campaignsSlider';
import DownloadPdf from './components/downloadPdf';
import GalleryHeader from './components/galleryHeader';
import ProjectsAbout from './components/projectsAbout';
import VideoHeader from './components/videoHeader';
import Carousel from './components/carousel';
import Counter from './components/counter';
import PostShare from './components/postShare';
import ContactsGG from './components/contactsGrantGuidelines';
import ContactUsForm from './components/contactUsForm';
import ContactCall from './components/contactCall';
import ContactSpain from './components/contactSpain';

import lmForm from './components/lmForm';


// jquery
import setMenuMobile from './lib/set_menu_mobile';
import setMenu from './lib/set_menu';
import donateRedirect from './lib/donate_redirect';
import smoothScroll from './lib/smoothScroll';
import scrollViaCrucisNav from './lib/scrollViaCrucisNav';
import toggleViaCrucisNav from './lib/toggleViaCrucisNav';
import toggleMenu from './lib/toggleMenu';
import stickyMenu from './lib/stickMenu';



window.mitt = mitt();

window.mitt.on('run:events', () => {
  runEvents();
});

WebFont.load({
  google: { families: ['Source Sans Pro:400,600,700'] },
  custom: {
    families: ['Ionicons'],
    testStrings: { Ionicons: '\uf10c\uf109' } },
});

// react renders
multipleRender(HeaderSlider, '.header-slider', true);
multipleRender(ContactForm, '.contact-form', true);
multipleRender(Posts, '.bs-posts', true);
multipleRender(Donate, '.bs-donate-react', true);
multipleRender(DonateInline, '.bs-donate-inline', true);
multipleRender(DonateInlineSection, '.bs-donate-inline-section', true);
multipleRender(DonateSection, '.bs-donate-section', true);
multipleRender(Projects, '.projects-container', true);
multipleRender(ProjectsInfo, '.bs-projects-info', true);
multipleRender(Accordion, '.bs-accordion', true);
multipleRender(sectionVideo, '.section-video', true);
multipleRender(sectionVideoContent, '.section-video-content', true);
multipleRender(CampaignsSlider, '.bs-campaings-slider', true);
multipleRender(DownloadPdf, '.bs-download-pdf', true);
multipleRender(GalleryHeader, '.bs-gallery-header', true);
multipleRender(ProjectsAbout, '.bs-projects-about', true);
multipleRender(VideoHeader, '.bs-video-header', true);
multipleRender(Carousel, '.bs-carousel', true);
multipleRender(Counter, '.bs-counter', true);
multipleRender(PostShare, '.bs-post-share', true);
multipleRender(ContactsGG, '.bs-contacts-gg', true);
multipleRender(ContactUsForm, '.bs-contact-form-us', true);
multipleRender(ContactCall, '.bs-contact-call', true);
multipleRender(lmForm, '.bs-lm-form', true);
multipleRender(ContactSpain, '.bs-contact-spain', true);

// jquery calls
setMenu();
setMenuMobile();
donateRedirect();
smoothScroll();
toggleViaCrucisNav();
scrollViaCrucisNav();
stickyMenu();
toggleMenu();

Raven.config('https://c1adcd5efa4f4e82b327c1780b0f7119@sentry.io/251903').install()
