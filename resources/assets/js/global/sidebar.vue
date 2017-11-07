<template lang="html">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a :class=" [(currentLink == home.link) ? 'active' : '' , 'nav-link']" :href="baseLink"><i class="icon-speedometer"></i> {{ home.name}} </a>
      </li>

      <li class="nav-title">MAIN NAVIGATION</li>

      <li :class=" [(navGroup == index) ? 'open' : '' , 'nav-item nav-dropdown']" v-for="(page,index) in pages">
        <a class="nav-link nav-dropdown-toggle" href="#"><i :class="page.icon"></i> {{ index }}</a>
        <ul class="nav-dropdown-items">
          <li :class=" [(currentLink == item.link) ? 'active' : '' , 'nav-item']" v-for="item in page.subs">
            <a class="nav-link" :href="baseLink+item.link+pathLink"><i :class="item.icon"></i> {{ item.name }}</a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
</template>

<script>
export default {
  data(){
    return {
      baseLink:'/admin/',
      pathLink:'/create',
      navGroup: '',
      home:{ name:'Tableau de bord', link:'admin' },
      pages:{
        'Caisse Principale' :{
          icon: 'icon-drawer',
          link: '',
          subs: [
              { name:'Ajouter charge', link:'caisse/principale', icon:'icon-plus' },
              { name:'Ajouter alimentation', link:'caisse/principale', icon:'icon-plus' },
              { name:'Liste des charges', link:'caisse/principale', icon:'icon-list' },
              { name:'Liste des alimentations', link:'caisse/principale', icon:'icon-list' },
              { name:'Combiné principale', link:'caisse/principale', icon:'icon-docs' },
          ]
        },
        'Caisse Sans Acompte' :{
          icon: 'icon-star',
          link: '',
          subs: [
              { name:'Ajouter charge', link:'categories', icon:'icon-plus'},
              { name:'Liste des charges', link:'categories', icon:'icon-list'},
          ]
        },
        'Opérations Bancaires' :{
          icon: 'icon-star',
          link: '',
          subs: [
              { name:'Relevés bancaires', link:'categories', icon:'icon-plus'},
          ]
        },
      },
    }
  },
  created(){
    this.isContainingLink();
  },
  computed:{
    currentLink: function(){
      let link = window.location.href;
      let tmp  = link.split('/');
      if (tmp[4]) {
          return tmp[4];
      }else{
        return 'admin';
      }
    }
  },

  methods:{
    isContainingLink(){
      let link = window.location.href;
      let tmp  = link.split('/');
      if (tmp[4]) {
        link = tmp[4];
      }else{
        link = 'admin';
      }
      let data = this.pages;
      let self = this;
      $.each(data,function(index,obj){
        $.each(obj,function(key,value){
          if(value.link == link){
              self.navGroup = index;
          }
        });
      });
    },
  }

}
</script>

<style lang="css">
</style>
