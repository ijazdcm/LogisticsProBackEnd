export default function DieselVendorMasterValidation(values, isTouched) {
  const errors = {}

  //Diesel Vendor Name Validation Rule
  if (isTouched.dieselVendorName && !values.dieselVendorName) {
    errors.dieselVendorName = 'Diesel Vendor Name is required'
  } else if (isTouched.dieselVendorName && !/^[a-zA-Z ]+$/.test(values.dieselVendorName)) {
    errors.dieselVendorName = 'Diesel Vendor Name only have Letters and space'
  }

  //Diesel Vendor Code Validation Rule
  if (isTouched.dieselVendorCode && !values.dieselVendorCode) {
    errors.dieselVendorCode = 'Diesel Vendor Code is required'
  } else if (isTouched.dieselVendorCode && !/^[\d]{6}$/.test(values.dieselVendorCode)) {
    errors.dieselVendorCode = 'Diesel Vendor Code only have 6 Digit Numeric'
  }

  //Diesel Vendor Mobile Number 1 Validation Rule
  if (isTouched.dieselVendorMobile1 && !values.dieselVendorMobile1) {
    errors.dieselVendorMobile1 = 'Diesel Vendor Mobile Number 1 is required'
  } else if (isTouched.dieselVendorMobile1 && !/^[\d]{10}$/.test(values.dieselVendorMobile1)) {
    errors.dieselVendorMobile1 = 'Diesel Vendor Mobile Number 1 only have 10 Digit Numeric'
  }

  //Diesel Vendor Mobile Number 2 Validation Rule
  if (isTouched.dieselVendorMobile2 && !values.dieselVendorMobile2) {
    errors.dieselVendorMobile2 = 'Diesel Vendor Mobile Number 2 is required'
  } else if (isTouched.dieselVendorMobile2 && !/^[\d]{10}$/.test(values.dieselVendorMobile2)) {
    errors.dieselVendorMobile2 = 'Diesel Vendor Mobile Number 2 only have 10 Digit Numeric'
  }

  //Diesel Vendor Mail-ID Validation Rule
  if (isTouched.dieselVendorMail && !values.dieselVendorMail) {
    errors.dieselVendorMail = 'Diesel Vendor Mail-Id is required'
  } else if (isTouched.dieselVendorMail && !/\S+@\S+\.\S+/.test(values.dieselVendorMail)) {
    errors.dieselVendorMail = 'Diesel Vendor Mail-Id Format is Invalid'
  }

  return errors
}
