using proyectoRed.Models;
using RestSharp;
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
    /// Lógica de interacción para RegistraUsuario.xaml
    /// </summary>
    public partial class RegistraUsuario : Window
    {
        public RegistraUsuario()
        {
            InitializeComponent();
        }

        public bool validacionCampos()
        {
            if (txtBox_Apellidos.Text.Length>0 && txtBox_Nombre.Text.Length > 0 && txtBox_Correo.Text.Length > 0 &&
                txtBox_Telefono.Text.Length > 0 && txtBox_Usuario.Text.Length > 0 && txt_Password.Password.Length > 0
                 && txt_PasswordConfirm.Password.Length > 0)
            {
                return true;
            }
            return false;
        }

        public bool validacionContrasena()
        {
            if (txt_Password.Password.Equals(txt_PasswordConfirm.Password))
            {
                return true;
            }
            return false;
        }

        private void btn_Registrar_Click(object sender, RoutedEventArgs e)
        {
            if (validacionCampos())
            {
                if (validacionContrasena())
                {
                    var client = new RestClient(Constant.url);
                    

                    var request = new RestRequest("register", Method.POST);

                    request.AddParameter("username", txtBox_Usuario.Text);
                    request.AddParameter("password", txt_Password.Password);

                    request.AddParameter("nombre", txtBox_Nombre.Text);
                    request.AddParameter("apellidos", txtBox_Apellidos.Text);
                    request.AddParameter("email", txtBox_Correo.Text);
                    request.AddParameter("telefono", txtBox_Telefono.Text);
                    request.AddParameter("genero", cb_Genero.SelectedValue.ToString());



                    IRestResponse response = client.Execute(request);
                    var content = response.Content;

                    if (response.IsSuccessful)
                    {

                        Console.WriteLine(content);

                        Login nuevoLogin = new Login();
                        nuevoLogin.Show();
                        this.Close();
                    }    
                    
                }
                else
                {
                    MessageBox.Show("Las contraseñas no coinciden");
                }
            }
            else
            {
                MessageBox.Show("Verifique los campos");
            }
        }

        private void btn_IniciarSesion_Click(object sender, RoutedEventArgs e)
        {
            Login login = new Login();
            login.Show();
            this.Close();
        }
    }
}
