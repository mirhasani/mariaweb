<template>
  <router-view />
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'App'
})
</script>
<style>
#Home , #about , #skils , #resume , #portfolio , #contact , #blog{
  height: 1000px;
  color: white;
  background-repeat:no-repeat;
  background-size: 100%;
  background-attachment: fixed;
  align-items: center;
}
#Home{
  background-image: url("../public/img/views/home-img.jpg");
  padding-top: 50px;
}
#about , #resume , #contact{
  background-color: #232222;
}
#skils{
  background-image: url("../public/img/views/skils-img.jpg");
}
#portfolio{
  background-image: url("../public/img/views/portfolio-img.jpg");
}
#blog{
  background-image: url("../public/img/views/blog-img.jpg");
}

.bgHeader  , .bgFooter {
  background-color: #232222;
}
.bgFooter{
  position: absolute;
}
*{
  font-family: Morabba;
}
#portfolio{
  background-color: #232222;
}
#portfolio a{
  color: rgba(224, 224, 5, 0.678);
}
.btn {
  background-color: #cf9c63;
  border: none;
  border-radius: 0;
  width: 150px;
  padding: 10px;
  font-weight: 600;
  color: white;

}
.btn:hover {
  color: #cf9c63;
  background-color: #232222;
}

</style>

