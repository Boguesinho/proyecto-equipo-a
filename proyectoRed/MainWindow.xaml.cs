using proyectoRed.VentanasIntlok;
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
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace proyectoRed
{
    /// <summary>
    /// Lógica de interacción para MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {

        private int botonSeleccionado = 1;
        Chat chat = new Chat();

        public MainWindow()
        {
            InitializeComponent();
            GridPrincipal.Children.Add(new Inicio());
            btnInicio.Background = Brushes.White;
        }

        private void Window_MouseDown(object sender, MouseButtonEventArgs e)
        {
            if (e.LeftButton == MouseButtonState.Pressed)
            {
                DragMove();
            }
        }

        private void BtnInicio_Click(object sender, RoutedEventArgs e)
        {
            if (botonSeleccionado != 1)
            {
                cambiarBoton(1);
                GridPrincipal.Children.Clear();
                GridPrincipal.Children.Add(new Inicio());
            } 
        }

        private void BtnEstados_Click(object sender, RoutedEventArgs e)
        {
            if (botonSeleccionado != 2)
            {
                cambiarBoton(2);
                GridPrincipal.Children.Clear();
                GridPrincipal.Children.Add(new Estado());

            }
        }

        private void BtnChats_Click(object sender, RoutedEventArgs e)
        {
            if (botonSeleccionado != 3)
            {
                cambiarBoton(3);
                GridPrincipal.Children.Clear();
                GridPrincipal.Children.Add(chat);
            }
        }

        private void BtnPerfil_Click(object sender, RoutedEventArgs e)
        {
            if (botonSeleccionado != 4)
            {
                cambiarBoton(4);
                GridPrincipal.Children.Clear();
                GridPrincipal.Children.Add(new Perfil());

            }
        }



        private void cambiarBoton(int seleccionado)
        {
            btnInicio.Background = Brushes.Transparent;
            btnEstados.Background = Brushes.Transparent;
            btnChats.Background = Brushes.Transparent;
            btnPerfil.Background = Brushes.Transparent;

            switch (seleccionado)
            {
                case (0):
                    break;

                case (1):
                    botonSeleccionado = 1;
                    btnInicio.Background = Brushes.White;
                    break;

                case (2):
                    botonSeleccionado = 2;
                    btnEstados.Background = Brushes.White;
                    break;

                case (3):
                    botonSeleccionado = 3;
                    btnChats.Background = Brushes.White;
                    break;

                case (4):
                    botonSeleccionado = 4;
                    btnPerfil.Background = Brushes.White;
                    break;

            }

        }
    }
}
