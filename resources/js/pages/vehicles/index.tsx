import { CCard, CCardBody, CCardHeader, CTable } from '@coreui/react'

export default function Vehicles() {
    return (
        <CCard>
            <CCardHeader>
                <strong>Vehicles</strong>
            </CCardHeader>

            <CCardBody>
                <CTable hover responsive>
                    <thead>
                        <tr>
                            <th>Plate Number</th>
                            <th>Vehicle Type</th>
                            <th>Capacity</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>TEST-001</td>
                            <td>Jeepney</td>
                            <td>20</td>
                            <td>Available</td>
                        </tr>
                    </tbody>
                </CTable>
            </CCardBody>
        </CCard>
    )
}