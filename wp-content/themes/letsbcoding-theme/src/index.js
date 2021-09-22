import "../css/style.scss"

// Our modules / classes
import MobileMenu from "./modules/MobileMenu"
import HeroSlider from "./modules/HeroSlider"
import LeafletMap from "./modules/Leaflet"
import Search from './modules/Search'
import MyNotes from './modules/MyNotes'
import Like from './modules/Like'
import StudentLike from './modules/StudentLike'
import TableSearch from './modules/TableSearch'


// Instantiate a new object using our modules/classes
const mobileMenu = new MobileMenu()
const heroSlider = new HeroSlider()
const leafletMap = new LeafletMap()
const search = new Search()
const myNotes = new MyNotes()
const like = new Like()
const studentLike = new StudentLike()
const tableSearch = new TableSearch()


// Allow new JS and CSS to load in browser without a traditional page refresh
if (module.hot) {
  module.hot.accept()
}
