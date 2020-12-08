using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace proyectoRed.VentanasIntlok
{
    /// <summary>
    /// Lógica de interacción para Registro.xaml
    /// </summary>
    public partial class Registro : Window
    {
        public Registro()
        {
            InitializeComponent();
        }
        private void btn_Ingresar_Click(object sender, RoutedEventArgs e)
        {
            if (validarCampos())
            {

                if (checkbox_Terminos.IsChecked == true)
                {

                }
                MessageBox.Show("Acepta Terminos y Condiciones");
            }
            else
            {
                MessageBox.Show("Campos Vacios");
            }
        }

        private bool validarCampos()
        {
            if (txtBox_Correo.Text.Length > 0 && txtBox_Usuario.Text.Length > 0 && txtBox_Password.Password.Length > 0 && txtBox_PasswordRep.Password.Length > 0)
            {
                return true;
            }
            return false;
        }
    }
}
