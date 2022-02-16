import axios from 'axios'

// const API_BASE_URL = 'http://localhost/' //Production
const API_BASE_URL = 'https://jsonplaceholder.typicode.com/todos/1' //Development

class DriverMaster {
  getVehicles() {
    return axios.get(API_BASE_URL)
  }

  createVehicles(value) {
    return axios.post(API_BASE_URL, value)
  }

  getVehiclesById(VehiclesId) {
    return axios.get(API_BASE_URL + '/' + VehiclesId)
  }

  updateVehicles(Vehicles, VehiclesId) {
    return axios.put(API_BASE_URL + '/' + VehiclesId, Vehicles)
  }

  deleteVehicles(VehiclesId) {
    return axios.delete(API_BASE_URL + '/' + VehiclesId)
  }
}

export default new DriverMaster()
