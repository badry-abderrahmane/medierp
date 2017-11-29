<template lang="html">
  <nav :class="'navbar is-'+$parent.color">
    <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
          <img src="/img/logo_nav.png" alt="MediERP v2.0: Finance et comptabilité" width="143" height="27">
      </a>
      <div class="navbar-burger burger" data-target="navMenuColorprimary-example">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div id="navMenuColorprimary-example" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" @click="$router.push({ path: `/` })">
          Tableau de bord
        </a>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Caisses
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item" @click="$router.push({ path: `/caisse` })">
              <p>
                <strong>Vue d'ensemble</strong>
                <br>
                <small>Statistiques et liens.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/caisse/alimentation` })">
              <p>
                <strong>Gestion Alimentations</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/caisse/charge` })">
              <p>
                <strong>Gestion Charges</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/caisse/typecharge` })">
              <p>
                <strong>Gestion Types charges</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Banques
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item" @click="$router.push({ path: `/banque` })">
              <p>
                <strong>Vue d'ensemble</strong>
                <br>
                <small>Statistiques et liens.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/banque/encaissement` })">
              <p>
                <strong>Gestion Encaissements</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/banque/decaissement` })">
              <p>
                <strong>Gestion Décaissements</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/banque/operation` })">
              <p>
                <strong>Gestion Opérations</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Entités
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item " @click="$router.push({ path: `/entite` })">
              <p>
                <strong>Vue d'ensemble</strong>
                <br>
                <small>Statistiques et liens.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/entite/societe` })">
              <p>
                <strong>Gestion Sociétés</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/entite/marche` })">
              <p>
                <strong>Gestion Marchés</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/entite/responsable` })">
              <p>
                <strong>Gestion Responsables</strong>
                <br>
                <small>Ajout et modifications.</small>
              </p>
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Inventaires
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item " @click="$router.push({ path: `/inventaire` })">
              <p>
                <strong>Vue d'ensemble</strong>
                <br>
                <small>Statistiques et liens.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/inventaire/charges` })">
              <p>
                <strong>Inventaire des charges</strong>
                <br>
                <small>Recherche et classifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/inventaire/alimentations` })">
              <p>
                <strong>Inventaire des alimentations</strong>
                <br>
                <small>Recherche et classifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/inventaire/encaissements` })">
              <p>
                <strong>Inventaire des encaissements</strong>
                <br>
                <small>Recherche et classifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/inventaire/decaissements` })">
              <p>
                <strong>Inventaire des décaissements</strong>
                <br>
                <small>Recherche et classifications.</small>
              </p>
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Combinés
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item " @click="$router.push({ path: `/combine` })">
              <p>
                <strong>Vue d'ensemble</strong>
                <br>
                <small>Statistiques et liens.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/combine/general` })">
              <p>
                <strong>Combiné générale</strong>
                <br>
                <small>Recherche et classifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/combine/caisse/filter` })">
              <p>
                <strong>Combiné caisses</strong>
                <br>
                <small>Recherche et classifications.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/combine/banque/filter` })">
              <p>
                <strong>Combiné banque</strong>
                <br>
                <small>Recherche et classifications.</small>
              </p>
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Rapports
          </a>
          <div class="navbar-dropdown">
            <a class="navbar-item " @click="$router.push({ path: `/rapport` })">
              <p>
                <strong>Vue d'ensemble</strong>
                <br>
                <small>Exportation et Backups.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/rapport/societe` })">
              <p>
                <strong>Rapport sociétés</strong>
                <br>
                <small>Exportation et Backups.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/combine/marche` })">
              <p>
                <strong>Rapport marchés</strong>
                <br>
                <small>Exportation et Backups.</small>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/combine/responsable` })">
              <p>
                <strong>Rapport Responsables</strong>
                <br>
                <small>Exportation et Backups.</small>
              </p>
            </a>
          </div>
        </div>
      </div>

      <div class="navbar-end">
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" @click="$router.push({ path: `/entite` })">
            Badry
          </a>
          <div class="navbar-dropdown is-right">
            <a class="navbar-item" @click="$router.push({ path: `/entite/marche` })">
              <p>
                <i class="fa fa-life-saver"></i>&nbsp;&nbsp;
                <strong>Support</strong>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" @click="$router.push({ path: `/entite/societe` })">
              <p>
                <i class="fa fa-info-circle"></i>&nbsp;&nbsp;
                <strong>A propos</strong>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item " @click="$router.push({ path: `/entite` })">
              <p>
                <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;
                <strong>Paramètres</strong>
              </p>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" href="/logout">
              <p>
                <i class="fa fa-sign-out"></i>&nbsp;&nbsp;
                <strong>Se déconnecter</strong>
              </p>
            </a>
          </div>
        </div>
      </div>
      &nbsp;&nbsp;&nbsp;
    </div>
  </nav>
</template>

<script>
export default {
  created(){
    //this.$parent.color = 'primary';
  }
}
</script>

<style lang="css">
</style>
