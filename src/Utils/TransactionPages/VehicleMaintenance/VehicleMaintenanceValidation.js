export default function VehicleMaintenanceValidation(values, isTouched) {
    const errors = {}



    if (isTouched.driverId && values.driverId === '') {
      errors.driverId = 'Required'

    }
    if (isTouched.maintenenceType && values.maintenenceType=== '') {
      errors.maintenenceType = 'Required'

    }
    if (isTouched.maintenenceBy && values.maintenenceBy=== '') {
      errors.maintenenceBy = 'Required'
      console.log("nisect present");
    }
    if (isTouched.workOrder && values.workOrder=== '') {
      errors.workOrder = 'Required'
    }

    if (isTouched.MaintenanceStart && !values.MaintenanceStart) {
      errors.MaintenanceStart = 'Required'
    }

    // if (isTouched.MaintenanceEnd && !values.MaintenanceEnd) {
    //   errors.MaintenanceEnd = "Required"
    // }
    return errors
  }
