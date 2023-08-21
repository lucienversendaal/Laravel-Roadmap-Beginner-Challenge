import "./bootstrap";

import Alpine from "alpinejs";
import tagify from "@yaireo/tagify";

import { Select, initTE } from "tw-elements";
initTE({ Select });

window.Alpine = Alpine;
window.Tagify = tagify;

Alpine.start();
