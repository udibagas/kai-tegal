export const state = () => ({
  listDipo: [],
  listJalur: [],
  listSarana: [],
  listJenisSarana: [],
  listJenisPekerjaan: [],
  listJenisDetailPekerjaan: [],
  // filters
  filterDipo: [],
  filterJalur: [],
  filterJenisSarana: [],
  filterJenisPekerjaan: [],
})

export const mutations = {
  setListDipo(state, data) {
    state.listDipo = data;
    state.filterDipo = data.map(l => {
      return {
        value: l.id,
        text: l.nama
      }
    })
  },

  setListJalur(state, data) {
    state.listJalur = data;
    state.filterJalur = data.map(l => {
      return {
        value: l.id,
        text: l.nama
      }
    })
  },

  setListJenisSarana(state, data) {
    state.listJenisSarana = data;
    state.filterJenisSarana = data.map(l => {
      return {
        value: l.id,
        text: l.nama
      }
    })
  },

  setListJenisPekerjaan(state, data) {
    state.listJenisPekerjaan = data;
    state.filterJenisPekerjaan = data.map(l => {
      return {
        value: l.id,
        text: l.nama
      }
    })
  },

  setListJenisDetailPekerjaan(state, data) {
    state.listJenisDetailPekerjaan = data;
  },

  setListSarana(state, data) {
    state.listSarana = data;
  },

}

export const actions = {
  async getListDipo({
    commit
  }) {
    let {
      data
    } = await this.$axios.get('/api/dipo')
    commit('setListDipo', data)
  },

  async getListJalur({
    commit
  }) {
    let {
      data
    } = await this.$axios.get('/api/jalur')
    commit('setListJalur', data)
  },

  async getListJenisSarana({
    commit
  }) {
    let {
      data
    } = await this.$axios.get('/api/jenisSarana')
    commit('setListJenisSarana', data)
  },

  async getListJenisPekerjaan({
    commit
  }) {
    let {
      data
    } = await this.$axios.get('/api/jenisPekerjaan')
    commit('setListJenisPekerjaan', data)
  },

  async getListJenisDetailPekerjaan({
    commit
  }) {
    let {
      data
    } = await this.$axios.get('/api/jenisDetailPekerjaan')
    commit('setListJenisDetailPekerjaan', data)
  },

  async getListSarana({
    commit
  }) {
    let {
      data
    } = await this.$axios.get('/api/sarana/getList')
    commit('setListSarana', data)
  },
}
