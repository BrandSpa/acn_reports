import multipleRender from "react-multiple-render";
import GeolifyForm from "./components/admin/geolifyForm";
import GalleryMetabox from "./components/admin/galleryMetabox";
import ContactGG from "./components/admin/contact_gg";

// multipleRender(GeolifyForm, ".bs-geolify");
multipleRender(GalleryMetabox, ".bs-gallery-metabox");
multipleRender(ContactGG, ".bs-contact-gg");
