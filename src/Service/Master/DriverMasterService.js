//Created By Alwin
import AppConfig from 'src/AppConfig'
import api from '../Config'

const DRIVER_MASTER_BASE_URL = AppConfig.api.baseUrl + '/drivers'

class DriverMasterService {
  getDrivers() {
    return api.get(DRIVER_MASTER_BASE_URL)
  }

  createDrivers(value) {
    return api.post(DRIVER_MASTER_BASE_URL, value)
  }

  getDriversById(DriversId) {
    return api.get(DRIVER_MASTER_BASE_URL + '/' + DriversId)
  }

  updateDrivers(DriversId, Drivers) {
    return api.post(DRIVER_MASTER_BASE_URL + '/' + DriversId, Drivers)
  }

  deleteDrivers(DriversId) {
    return api.delete(DRIVER_MASTER_BASE_URL + '/' + DriversId)
  }
}

export default new DriverMasterService()
